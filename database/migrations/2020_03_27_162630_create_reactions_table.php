<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Reaction;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->enum('reaction', [Reaction::BOOKMARK, Reaction::FAVOURITE]);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('post_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}
