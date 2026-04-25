<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('est_suspendu')->default(false)->after('score_confiance');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('est_suspendu');
        });
    }
};