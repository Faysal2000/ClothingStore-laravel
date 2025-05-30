<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // ID
            $table->string('name');  // الاسم
            $table->decimal('price', 8, 2)->nullable();  // السعر
            $table->text('description')->nullable();  // الوصف
            $table->integer('quantity')->nullable();  // الكمية
            $table->string('imagepath')->nullable();  // مسار الصورة
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // ربط المنتج بفئة معينة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
