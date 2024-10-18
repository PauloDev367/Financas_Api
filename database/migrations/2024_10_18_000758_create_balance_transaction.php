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
        Schema::create('balance_transaction', function (Blueprint $table) {
            $table->id();
            $table->boolean("received")->default(true);
            $table->date("received_when")->default((new DateTime())->format("Y-m-d h:i:s"));
            $table->string("description", 240)->nullable(true);
            $table->integer("type");
            $table->float("value");

            $table->unsignedBigInteger("balance_id");

            $table->foreign("balance_id")->references("id")->on("balances");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_transaction');
    }
};
