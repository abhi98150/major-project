<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn(['company_name', 'pan_no', 'mobile_no']);
            
            // Add new column with default value
            $table->string('role')->default('user'); // Adding role column with default value 'user'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add back the removed columns
            $table->string('company_name')->nullable();
            $table->string('pan_no')->nullable()->unique();
            $table->string('mobile_no')->nullable()->unique();
            
            // Remove the role column
            $table->dropColumn('role');
        });
    }
}
