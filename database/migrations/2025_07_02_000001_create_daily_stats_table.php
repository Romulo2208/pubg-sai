<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('daily_stats', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->integer('kills');
            $table->integer('assists');
            $table->integer('damage');
            $table->float('survived_minutes');
            $table->integer('rescues');
            $table->integer('call_back');
            $table->float('score');
            $table->integer('mvp_count');
            $table->integer('coffee_breaks');
            $table->boolean('played')->default(true);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('daily_stats');
    }
};
