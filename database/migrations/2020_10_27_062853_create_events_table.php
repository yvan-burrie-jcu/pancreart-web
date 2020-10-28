<?php

use App\Event as EventModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->timestamp('time');
            $table->enum('type', [
                EventModel::TYPE_GLUCOSE_READING,
                EventModel::TYPE_INSULIN_INJECTION,
            ]);
            $table->float('amount', 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
