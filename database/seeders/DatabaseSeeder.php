<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //0 = Collecteurs, 1 = Agents de recouvrement, 2 = Régisseur, 3 = Agent d'assiette,  4 = Administrateurs municipaux à rôle élevé, 5 = Administrateurs système, 6 = Developeurs
            
         \App\Models\Role::factory()->create([
            'id' => 1,
            'name' => 'Collecteur',
            'description' => 'Collecteur',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 2,
            'name' => 'Recouvreur',
            'description' => 'Agent de recouvrement',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 3,
            'name' => 'Régisseur',
            'description' => 'Régisseur',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 4,
            'name' => 'Agent d\'assiette',
            'description' => 'Agent d\'assiette',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 5,
            'name' => 'Administrateur',
            'description' => 'Administrateur municipal',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 6,
            'name' => 'Super Administrateur',
            'description' => 'Administrateurs système',
        ]);
        \App\Models\Role::factory()->create([
            'id' => 7,
            'name' => 'Developeur',
            'description' => 'Developeur',
        ]);

        
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'role_id' => 6,
        ]);
    }
}
