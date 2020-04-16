<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSystemSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $title = env('APP_NAME', 'Nome da Empresa');

        DB::table('systems')->insert([
            'title' => $title
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $title = env('APP_NAME', 'Nome da Empresa');
        DB::delete('DELETE FROM systems WHERE title = ?', [$title]);
    }
}
