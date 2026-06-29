<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE games MODIFY COLUMN prix DECIMAL(10, 2)');
        DB::statement('ALTER TABLE games MODIFY COLUMN image VARCHAR(2048)');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE games MODIFY COLUMN prix TEXT');
        DB::statement('ALTER TABLE games MODIFY COLUMN image TEXT');
    }
};
