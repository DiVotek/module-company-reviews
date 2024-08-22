<?php

namespace Modules\CompanyReviews\Models;

use App\Traits\HasStatus;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyReview extends Model
{
    use HasFactory;
    use HasStatus;
    use HasTimestamps;

    protected $fillable = ['name', 'rating', 'logo', 'images', 'text', 'status', 'created_at'];

    protected $casts = ['images' => 'array'];

    public static function getDb(): string
    {
        return 'company_reviews';
    }
}
