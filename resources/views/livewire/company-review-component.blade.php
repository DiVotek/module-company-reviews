<div>
    <form wire:submit.prevent="save">
        <!-- Display Success Message -->
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" id="name" wire:model="companyReview.name" class="form-control @error('companyReview.name') is-invalid @enderror">
            @error('companyReview.name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Rating Field -->
        <div class="mb-4">
            <label for="rating">{{ __('Rating') }}</label>
            <input type="number" id="rating" wire:model="companyReview.rating" min="1" max="5" class="form-control @error('companyReview.rating') is-invalid @enderror">
            @error('companyReview.rating')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Logo Field -->
        <div class="mb-4">
            <label for="logo">{{ __('Logo URL') }}</label>
            <input type="text" id="logo" wire:model="companyReview.logo" class="form-control @error('companyReview.logo') is-invalid @enderror">
            @error('companyReview.logo')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Images Field -->
        <div class="mb-4">
            <label for="images">{{ __('Images') }}</label>
            <input type="text" id="images" wire:model="companyReview.images" class="form-control @error('companyReview.images') is-invalid @enderror" placeholder="Enter image URLs separated by commas">
            @error('companyReview.images')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Text Field -->
        <div class="mb-4">
            <label for="text">{{ __('Review Text') }}</label>
            <textarea id="text" wire:model="companyReview.text" class="form-control @error('companyReview.text') is-invalid @enderror" rows="4"></textarea>
            @error('companyReview.text')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="btn btn-primary">{{ __('Submit Review') }}</button>
        </div>
    </form>
</div>
