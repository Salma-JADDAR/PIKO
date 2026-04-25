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
        Schema::table('contacts', function (Blueprint $table) {
            // Ajouter le champ reponse_envoyee (boolean, default false)
            $table->boolean('reponse_envoyee')->default(false)->after('message');
            
            // Ajouter le champ date_reponse (timestamp, nullable)
            $table->timestamp('date_reponse')->nullable()->after('reponse_envoyee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Supprimer les champs si on fait rollback
            $table->dropColumn(['reponse_envoyee', 'date_reponse']);
        });
    }
};