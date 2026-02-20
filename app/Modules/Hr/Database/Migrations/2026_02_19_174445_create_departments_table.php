<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->foreignId('company_id')->constrained('companies', 'id')->onDelete('cascade');
            $table->foreignId('parent_department_id')->nullable()->constrained('departments', 'id')->onDelete('set null');
            $table->string('cost_center')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->foreignId('default_attendance_policy_id')->nullable()->constrained('attendance_policies', 'id')->onDelete('set null');
            $table->foreignId('default_work_pattern_id')->nullable()->constrained('work_patterns', 'id')->onDelete('set null');
            
            			$table->unique('code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
