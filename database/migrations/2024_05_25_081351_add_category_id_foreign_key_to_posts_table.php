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
        Schema::table('posts', function (Blueprint $table) {
            //1. create the column that will hold the a foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            //2. Assign the foreign key to the column created above
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // 1. drop the foreing key
            $table->dropForeign('posts_category_id_foreign');
            //2. drop the column
            $table->dropColumn('category_id');
        });
    }
};
