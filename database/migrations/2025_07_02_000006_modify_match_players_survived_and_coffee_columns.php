<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('match_players', function (Blueprint $table) {
            $table->float('survived')->change();
            $table->boolean('coffee')->change();
        });
    }

    public function down() {
        Schema::table('match_players', function (Blueprint $table) {
            $table->boolean('survived')->change();
            $table->integer('coffee')->change();
        });
    }
};
