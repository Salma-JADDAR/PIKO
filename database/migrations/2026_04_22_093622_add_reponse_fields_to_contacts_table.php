<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
   
    public function up(): void{
        Schema::table('contacts', function (Blueprint $table) {
          $table->boolean('reponse_envoyee')->default(false)->after('message');
            $table->timestamp('date_reponse')->nullable()->after('reponse_envoyee');
        });
    }

  
    public function down(): void{
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['reponse_envoyee', 'date_reponse']);
        });
    }
};