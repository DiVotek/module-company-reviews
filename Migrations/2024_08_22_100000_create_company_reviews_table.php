<?php

use App\Models\StaticPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\CompanyReviews\Models\CompanyReview;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(CompanyReview::getDb(), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rating');
            $table->string('logo');
            $table->json('images');
            $table->mediumText('text');
            $table->integer('status')->default(0);
            CompanyReview::timestampFields($table);
        });
        StaticPage::createSystemPage('Reviews', 'reviews');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(CompanyReview::getDb());
    }
};
