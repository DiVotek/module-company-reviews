<?php

namespace Modules\CompanyReviews\Admin\CompanyReviewsResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\CompanyReviews\Admin\CompanyReviewsResource;

class ListCompanyReviews extends ListRecords
{
    protected static string $resource = CompanyReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
