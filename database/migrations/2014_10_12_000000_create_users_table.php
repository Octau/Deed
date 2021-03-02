<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('contact_number', 14);
        });

        DB::table('users')->insert(
            array(
                'name' => 'Octavius',
                'email' => 'octavius@deed.com',
                'password' => bcrypt('password'),
                'contact_number' => '6281348871346',
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'Fransiscus',
                'email' => 'fransiscus@deed.com',
                'password' => bcrypt('password'),
                'contact_number' => '6281348871340',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
