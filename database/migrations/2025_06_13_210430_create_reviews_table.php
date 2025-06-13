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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // it is creating reference to other table - book
            // it is foreign key
            // It create correspodence with other table
            $table->unsignedTinyInteger('book_id');

            $table->text('review');
            $table->unsignedTinyInteger('rating'); // rating 1-5

            $table->timestamps();

            // creating foreign ke

            // $table->foreign('book_id')
            //     ->references('id')
            //     ->on('books')
            //     ->onDelete('cascade');
            // below is shortest version
            // costrained() Automatycznie wiąże ten klucz obcy z kolumną id w tabeli books
            // Gdy rekord w tabeli books zostanie usunięty:

            // Wszystkie powiązane rekordy (gdzie book_id = usunięte ID) zostaną automatycznie usunięte
            $table->foreignId('book_id')->costrained()->cascadeOnDelete();

            //moge zrobic migracje aby odswiezyc table i dodac potrzebne kolumny
            // trzeba modelom powiedziec o relacji
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
