<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'terms_and_conditions'],
            ['value' => '<h1>Termes et Conditions d’Utilisation</h1>

<p>
    Bienvenue sur <strong>TechVente</strong> ! En utilisant cette plateforme, vous acceptez les présentes conditions d’utilisation. 
    Merci de les lire attentivement.
</p>

<h2>1. Utilisation de la plateforme</h2>
<p>
    La plateforme est destinée uniquement à l’administrateur pour gérer les ventes, les clients et les produits. 
    Toute utilisation non autorisée est interdite.
</p>

<h2>2. Responsabilités</h2>
<p>
    L’administrateur est responsable de la gestion des données et doit s’assurer que les informations saisies sont exactes. 
    TechVente n’est pas responsable des erreurs de saisie.
</p>

<h2>3. Propriété intellectuelle</h2>
<p>
    Tous les contenus, logos et éléments graphiques présents sur TechVente sont protégés. Leur utilisation sans autorisation est interdite.
</p>

<h2>4. Modifications</h2>
<p>
    TechVente peut modifier ces termes à tout moment. Les modifications seront effectives dès leur publication sur la plateforme.
</p>

<p class="footer-note">
    Merci d’utiliser TechVente de manière responsable.
</p>']
        );
    }
}
