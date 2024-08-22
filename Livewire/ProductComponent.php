<?php

namespace Modules\CompanyReviews\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\CompanyReviews\Models\CompanyReview;

class CompanyReviewsComponent extends Component
{
    public CompanyReview $companyReview;

    protected $rules = [
        'companyReview.name' => 'required|string|max:255',
        'companyReview.rating' => 'required|numeric|min:1|max:5',
        'companyReview.logo' => 'required|string',
        'companyReview.images' => 'required|array',
        'companyReview.text' => 'required|string',
    ];

    public function mount(CompanyReview $entity)
    {
        $this->companyReview = $entity;
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->companyReview->save();
        session()->flash('message', __('Company review saved successfully.'));
    }

    public function render(): View|Factory|Application
    {
        return view('product::livewire.company-review-component');
    }
}
