<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('duration_hours', 4, 2)->nullable();
            $table->decimal('break_duration', 4, 2)->default(0);
            $table->boolean('is_overnight')->default(false);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->decimal('overtime_starts_after', 4, 2)->default(8);
            $table->integer('grace_period_minutes')->default(5);
            $table->decimal('max_shift_hours', 4, 2)->default(12);
            $table->string('shift_category')->default('regular')->nullable();
            $table->decimal('pay_multiplier', 3, 2)->default(1);
            $table->integer('minimum_staffing')->default(1)->nullable();
            $table->boolean('is_restricted')->default(false);
            $table->integer('created_from_template_id')->nullable();
            $table->date('last_used_date')->nullable();
            $table->integer('usage_count')->default(0);
            
            			$table->index('code');
			$table->index('is_active');
			$table->index('is_default');
			$table->index('shift_category');
			$table->index('is_overnight');
			$table->index(['is_active', 'is_default']);
			$table->index(['start_time', 'end_time']);
			$table->unique('code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
};
