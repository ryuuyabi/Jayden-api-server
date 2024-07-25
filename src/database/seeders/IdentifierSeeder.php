<?php

namespace Database\Seeders;

use App\Enums\Identifier\IdentifierType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table('identifiers');
        $table->insert([
            'sub' => \uuid_create(),
            'identifier_type' => IdentifierType::OPERATOR_SERVER,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $table->insert([
            'sub' => \uuid_create(),
            'identifier_type' => IdentifierType::OPERATOR_CLIENT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
