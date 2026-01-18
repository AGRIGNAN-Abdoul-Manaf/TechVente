<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Affiche les termes et conditions (Public)
     */
    public function showTerms()
    {
        $terms = Setting::where('key', 'terms_and_conditions')->first();
        return view('terms', compact('terms'));
    }

    /**
     * Formulaire d'édition des termes (Admin)
     */
    public function editTerms()
    {
        $terms = Setting::where('key', 'terms_and_conditions')->first();
        return view('settings.edit_terms', compact('terms'));
    }

    /**
     * Sauvegarde les modifications
     */
    public function updateTerms(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);

        Setting::updateOrCreate(
            ['key' => 'terms_and_conditions'],
            ['value' => $request->value]
        );

        return redirect()->back()->with('success', 'Conditions d’utilisation mises à jour avec succès.');
    }
}
