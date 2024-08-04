<?php
// create_leads_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('message_id')->nullable();
            $table->string('chat_id')->nullable();
            $table->timestamps();
            $table->text('lead_source_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
