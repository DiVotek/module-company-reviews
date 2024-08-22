<?php

namespace Modules\CompanyReviews\Admin\CompanyReviewsResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\CompanyReviews\Admin\CompanyReviewsResource;

class CreateCompanyReview extends CreateRecord
{
    protected static string $resource = CompanyReviewsResource::class;
}
