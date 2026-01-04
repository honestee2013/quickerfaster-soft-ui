<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees', 'id')->onDelete('cascade');
            $table->foreignId('leave_type_id')->constrained('leave_types', 'id')->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason')->nullable();
            $table->string('status')->default('Pending');
            $table->foreignId('approved_by')->nullable()->constrained('employees', 'id')->onDelete('set null');
            $table->datetime('approved_at')->nullable();
            $table->text('denial_reason')->nullable();
            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
};
