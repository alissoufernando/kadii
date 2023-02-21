<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'liste-produit',
            'ajouter-produit',
            'modifier-produit',
            'supprimer-produit',
            'ajouter-image-produit',
            'supprimer-image-produit',
            'ajouter-attribut-produit',
            'supprimer-attribut-produit',
            'liste-categorie',
            'ajouter-categorie',
            'modifier-categorie',
            'supprimer-categorie',
            'liste-marque',
            'ajouter-marque',
            'modifier-marque',
            'supprimer-marque',
            'liste-attribut',
            'ajouter-attribut',
            'modifier-attribut',
            'supprimer-attribut',
            'liste-role',
            'ajouter-role',
            'modifier-role',
            'supprimer-role',
            'parametre-du-site',
            'liste-utilisateur',
            'voir-utilisateur',
            'ajouter-utilisateur',
            'modifier-utilisateur',
            'supprimer-utilisateur',
            'liste-valeur-attribut',
            'ajouter-valeur-attribut',
            'modifier-valeur-attribut',
            'supprimer-valeur-attribut'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $superAdminRole=Role::create([ 'name' =>'Super Administrateur'])->givePermissionTo(Permission::all());
        $adminRole = Role::create(['name' => 'Administrateur'])->givePermissionTo(
            [
                'liste-produit',
                'ajouter-produit',
                'modifier-produit',
                'supprimer-produit',
                'ajouter-image-produit',
                'supprimer-image-produit',
                'ajouter-attribut-produit',
                'supprimer-attribut-produit',
                'liste-categorie',
                'ajouter-categorie',
                'modifier-categorie',
                'supprimer-categorie',
                'liste-marque',
                'ajouter-marque',
                'modifier-marque',
                'supprimer-marque',
                'liste-attribut',
                'ajouter-attribut',
                'modifier-attribut',
                'supprimer-attribut',
                'liste-role',
                'ajouter-role',
                'modifier-role',
                'parametre-du-site',
                'liste-utilisateur',
                'voir-utilisateur',
                'ajouter-utilisateur',
                'liste-valeur-attribut',
                'ajouter-valeur-attribut',
                'modifier-valeur-attribut',
                'supprimer-valeur-attribut'
            ]
        );
        $userRole= Role::create(['name' => 'Utilisateur']);
    }
}
