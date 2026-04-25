<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::table('users', function (Blueprint $table) {
           $table->timestamp('suspendu_le')->nullable()->after('est_suspendu');
            $table->text('raison_suspension')->nullable()->after('suspendu_le');
        });
    }

    public function down(): void{
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['suspendu_le', 'raison_suspension']);
        });
    }
};