<?php

use App\Models\Biker;
use App\Models\Sender;
use App\Models\User;
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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(User::class,'sender_id');
            $table->foreignIdFor(User::class,'biker_id')->nullable();
            $table->string('name');
            $table->string('pick_up');
            $table->string('drop_off');
            $table->timestamp('pick_up_at')->nullable();
            $table->timestamp('drop_off_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 new parcel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
};
