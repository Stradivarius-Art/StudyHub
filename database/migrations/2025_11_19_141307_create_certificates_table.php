<?php

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Course::class, 'course_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Order::class, 'order_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('certificate_number')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};