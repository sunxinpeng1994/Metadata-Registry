<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompoundIndexToSchemauserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DELETE FROM schema_has_user
    WHERE created_at != '2015-07-10 16:06:49'
    anduser_id = 117
    AND schema_id = 24;");
        Schema::table('schema_has_user',
            function(Blueprint $table) {
                $table->unique([ 'schema_id', 'user_id' ], 'schema_user');
                $table->index([ 'user_id', 'schema_id' ], 'user_schema');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schema_has_user',
            function(Blueprint $table) {
                $table->dropUnique('schema_user');
                $table->dropIndex('user_schema');
            });
    }
}
