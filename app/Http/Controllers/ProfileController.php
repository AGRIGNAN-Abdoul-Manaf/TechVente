<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Afficher le formulaire d'édition du profil.
     */
    public function edit()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        return view('profile.edit', compact('user'));
    }

    /**
     * Mettre à jour le profil de l'utilisateur.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // L'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Gestion de l'image de profil
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profiles', 'public'); // stockage dans storage/app/public/profiles
            $user->profile_picture = $path;
        }

        // Mise à jour des infos
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Sauvegarde en base de données

        return back()->with('success', 'Profil mis à jour avec succès ✅');
    }
}
