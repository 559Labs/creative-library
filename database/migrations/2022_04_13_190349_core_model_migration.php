<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            "mediaitems", 
            function(Blueprint $t) {
                $t->id();
                $t->timestamps();
            }
        );
        Schema::create(
            "assets", 
            function(Blueprint $t) {
                $t->id();
                $t->timestamps();
            }
        );

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            "assets", "mediaitems",
        ];
        foreach ($tables as $t) {
            Schema::dropIfExists($t);
        }
    }
};
