
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_animations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('popup_id');
            $table->foreign('popup_id')
                ->references('id')
                ->on('popups')
                ->onDelete('cascade');
            $table->string('animation');

        });

        Schema::create('popup_buttons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('popup_id');
            $table->string('bt_name');

            $table->foreign('popup_id')
                ->references('id')
                ->on('popups')
                ->onDelete('cascade');
        });

        Schema::create('popup_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('popup_id');
            $table->string('content');
            
            $table->foreign('popup_id')
                ->references('id')
                ->on('popups')
                ->onDelete('cascade');
        });

        Schema::create('popup_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('popup_id');
            $table->string('image');

            $table->foreign('popup_id')
                ->references('id')
                ->on('popups')
                ->onDelete('cascade');
        });

        Schema::create('popup_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('popup_id');
            $table->string('side');
            $table->string('v_center');

            $table->foreign('popup_id')
                ->references('id')
                ->on('popups')
                ->onDelete('cascade');
        });

        DB::table('popups')->insert(
            array(
                'title' => 'Lorem ipsum',
            )
        );
        DB::table('popup_animations')->insert(
            array(
                'popup_id' => 1,
                'animation' => "on" ,
            )
        );
        DB::table('popup_buttons')->insert(
            array(
                'popup_id' => 1,
                'bt_name' => "That's fine." ,
            )
        );
        DB::table('popup_contents')->insert(
            array(
                'popup_id' => 1,
                'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." ,

            )
        );
        DB::table('popup_images')->insert(
            array(
                'popup_id' => 1,
                'image' => "https://cdn-icons-png.flaticon.com/512/1047/1047711.png" ,

            )
        );
        DB::table('popup_positions')->insert(
            array(
                'popup_id' => 1,
                'side' => "topRight" ,
                'v_center' => 'off'
            )
        );

        DB::table('popups')->insert(
            array(
                'title' => 'Lorem ipsum',
            )
        );
        DB::table('popup_animations')->insert(
            array(
                'popup_id' => 2,
                'animation' => "on" ,
            )
        );
        DB::table('popup_buttons')->insert(
            array(
                'popup_id' => 2,
                'bt_name' => "That's fine." ,
            )
        );
        DB::table('popup_contents')->insert(
            array(
                'popup_id' => 2,
                'content' => "This is a content. This is a content. This is a content. This is a content. This is a content." ,

            )
        );
        DB::table('popup_images')->insert(
            array(
                'popup_id' => 2,
                'image' => "https://cdn-icons-png.flaticon.com/512/1047/1047711.png" ,

            )
        );
        DB::table('popup_positions')->insert(
            array(
                'popup_id' => 2,
                'side' => "top" ,
                'v_center' => 'off'
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
        Schema::dropIfExists('popup_animations');
        Schema::dropIfExists('popup_buttons');
        Schema::dropIfExists('popup_contents');
        Schema::dropIfExists('popup_images');
        Schema::dropIfExists('popup_positions');
    }
};
