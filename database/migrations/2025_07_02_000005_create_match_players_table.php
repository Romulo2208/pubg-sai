<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('match_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->onDelete('cascade');
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->integer('kills');
            $table->integer('assists');
            $table->integer('damage');
            $table->boolean('survived');
            $table->integer('rescue');
            $table->integer('recall');
            $table->float('score');
            $table->boolean('mvp');
            $table->integer('coffee');
            $table->boolean('played');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('match_players');
    }
};
