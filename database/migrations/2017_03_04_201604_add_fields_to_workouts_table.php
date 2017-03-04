<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->integer('sets')->nullable()->change();
            $table->integer('reps')->nullable()->change();
            $table->integer('drop_reps')->nullable()->after('reps');
            $table->integer('drop_weight')->nullable()->after('drop_reps');
            $table->text('countdown')->nullable()->after('drop_weight');
            $table->text('pyramid')->nullabel()->after('countdown');
            $table->integer('cluster_reps')->nullable()->after('pyramid');
            $table->integer('cluster_weight')->nullable()->after('cluster_reps');
            $table->text('ladders')->nullable()->after('cluster_weight');
            $table->integer('partial_reps')->nullable()->after('ladders');
            $table->integer('partial_weight')->nullable()->after('partial_reps');
            $table->text('eccentric')->nullable()->after('partial_weight');
            $table->text('peak_contraction')->nullable()->after('eccentric');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn('drop_reps');
            $table->dropColumn('drop_weight');
            $table->dropColumn('countdown');
            $table->dropColumn('pyramid');
            $table->dropColumn('cluster_reps');
            $table->dropColumn('cluster_weight');
            $table->dropColumn('ladders');
            $table->dropColumn('partial_reps');
            $table->dropColumn('partial_weight');
            $table->dropColumn('eccentric');
            $table->dropColumn('peak_contraction');
        });
    }
}
