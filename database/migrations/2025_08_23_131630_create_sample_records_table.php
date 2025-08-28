<?php

use App\Enums\Sample\SampleRecordEnumerate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sample_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('string');
            $table->string('email')->nullable();
            $table->string('n_p_w_p')->nullable();
            $table->ipAddress('i_p_address')->nullable();
            $table->integer('integer')->nullable();
            $table->decimal('decimal')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->boolean('boolean')->nullable();
            $table->enum('enumerate', SampleRecordEnumerate::values())->nullable();
            $table->text('text')->nullable();
            $table->text('file')->nullable();
            $table->text('image')->nullable();
            $table->text('markdown_text')->nullable();
            $table->text('w_y_s_i_w_y_g')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->json('json')->nullable();
            $table->foreignUuid('created_by')->nullable()->index();
            $table->foreignUuid('updated_by')->nullable()->index();
            $table->string('upload_dir')->nullable();

            $table->timestamps();

            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_records');
    }
};
