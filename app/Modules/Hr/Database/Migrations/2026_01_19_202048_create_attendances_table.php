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
            $table->foreignId('employee_id')->nullable()->constrained('employees', 'id')->onDelete('restrict');
            $table->string('employee_number');
            $table->string('company')->nullable();
            $table->string('department')->nullable();
            $table->date('date');
            $table->decimal('net_hours', 6, 2)->nullable();
            $table->string('status')->default('present');
            $table->json('sessions')->nullable();
            $table->foreignId('shift_id')->nullable()->constrained('shifts', 'id')->onDelete('restrict');
            $table->string('absence_type')->nullable();
            $table->boolean('is_unplanned')->default(false);
            $table->text('absence_reason')->nullable();
            $table->boolean('is_paid_absence')->default(true);
            $table->decimal('hours_deducted', 6, 2)->default(0)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->string('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('needs_review')->default(true);
            $table->foreignId('leave_request_id')->nullable()->constrained('leave_requests', 'id')->onDelete('set null');
            $table->datetime('last_calculated_at')->nullable();
            $table->string('calculation_method')->default('auto')->nullable();
            
            			$table->index('employee_id');
			$table->index('date');
			$table->index('status');
			$table->index('is_approved');
			$table->index('needs_review');
			$table->index('leave_request_id');
			$table->index(['employee_id', 'date']);
			$table->index(['status', 'date']);
			$table->index(['is_approved', 'date']);
			$table->index(['needs_review', 'date']);
			$table->unique(['employee_id', 'date']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
