<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => 'Sharing',
                'description' => 'Sharing knowledge can get more than a person study alone',
            ],
            [
                'name'        => 'Tutorial',
                'description' => 'You may find useful developing skills and packages, etc.',
            ],
            [
                'name'        => 'Q & A',
                'description' => 'Asking questions is a way to keeping a person updated',
            ],
            [
                'name'        => 'Announcement',
                'description' => 'The lastest notice and announcement will be found here',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
