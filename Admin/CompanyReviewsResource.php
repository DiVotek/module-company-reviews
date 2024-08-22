<?php

namespace Modules\CompanyReviews\Admin;

use App\Models\Setting;
use App\Services\Schema;
use App\Services\TableSchema;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Modules\CompanyReviews\Models\CompanyReview;
use Modules\CompanyReviews\Admin\CompanyReviewsResource\Pages;

class CompanyReviewsResource extends Resource
{
    protected static ?string $model = CompanyReview::class;

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Communication');
    }

    public static function getModelLabel(): string
    {
        return __('Company review');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Company reviews');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Schema::getName(),
                        Schema::getLogo()->required(),
                        Schema::getImages()->required(),
                        Schema::getText()->required(),
                        Schema::getStatus(),
                        Schema::getRating()->required(),
                        Schema::getCreatedAt()->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TableSchema::getName(),
                TableSchema::getRating(),
                TableSchema::getStatus(),
                TableSchema::getCreatedAt(),
                TableSchema::getUpdatedAt(),
            ])
            ->headerActions([
                Action::make(__('Help'))
                    ->iconButton()
                    ->icon('heroicon-o-question-mark-circle')
                    ->modalDescription(__('Here you can manage blog categories. Blog categories are used to group blog articles. You can create, edit and delete blog categories as you want. Blog category will be displayed on the blog page or inside slider(modules section). If you want to disable it, you can do it by changing the status of the blog category.'))
                    ->modalFooterActions([]),

            ])
            ->reorderable('sorting')
            ->filters([
                TableSchema::getFilterStatus(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Template')
                    ->slideOver()
                    ->icon('heroicon-o-cog')
                    ->fillForm(function (): array {
                        return [
                            'design' => setting(config('settings.company_reviews.design'), 'Base'),
                        ];
                    })
                    ->action(function (array $data): void {
                        setting([
                            config('settings.company_reviews.design') => $data['design'],
                        ]);
                        Setting::updatedSettings();
                    })
                    ->form(function ($form) {
                        return $form
                            ->schema([
                                Schema::getModuleTemplateSelect('Pages/CompanyReviews'),
                                Section::make('')->schema([
                                    Schema::getTemplateBuilder()->label(__('Template')),
                                ]),
                            ]);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyReviews::route('/'),
            'create' => Pages\CreateCompanyReview::route('/create'),
            'edit' => Pages\EditCompanyReview::route('/{record}/edit'),
        ];
    }
}
