<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('date');
            $table->decimal('net_hours', 8, 2);
            $table->json('sessions')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_approved')->default(false);
            $table->string('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('needs_review')->default(false);
            $table->foreignId('leave_request_id')->nullable()->constrained('leave_requests', 'id')->onDelete('set null');
            $table->string('absence_type')->nullable();
            $table->boolean('is_unplanned')->default(false);
            $table->text('absence_reason')->nullable();
            $table->boolean('is_paid_absence')->default(true);
            $table->decimal('hours_deducted', 6, 2)->default(8)->nullable();
            
            			$table->unique(['employee_id', 'date']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
