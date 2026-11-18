<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'sliders',
            'services',
            'products',
            'features',
            'team_members',
            'testimonials',
            'blog_posts',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && ! Schema::hasColumn($tableName, 'translations')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->json('translations')->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'sliders',
            'services',
            'products',
            'features',
            'team_members',
            'testimonials',
            'blog_posts',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, 'translations')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn('translations');
                });
            }
        }
    }
};
