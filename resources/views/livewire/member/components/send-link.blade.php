<div class="row align-items-center justify-content-center">
    <div class="col-lg-6 col-xl-6">
        <div class="overflow-hidden">
            <span class="featured-text wow fadeInDown" data-wow-delay="200ms">Interested In The book</span>
            <h2 class="text-lg font-serif wow fadeInLeft mb-3" data-wow-delay="200ms">Recreating your world</h2>
            <p class="mb-5 mb-0 lead">* Download link will be emailed to you.</p>
        </div>
    </div>

    <div class="col-lg-6 col-xl-6">
        <form action="#"  wire:submit.prevent="sendLink" class="sub-form">
            <div class="form-group">
                <input type="text" wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Full Name">
            </div>
            @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
            <div class="form-group">
                <input type="text" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" wire:model.lazy="email" placeholder="Enter Your email">
            </div>
            @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

            <div class="form-group">
                <button type="submit" wire:loading.remove wire:target="sendLink" class="btn btn-main-2">Get download link<i class="fa fa-angle-right"></i></button>
                <button type="submit" wire:loading wire:target="sendLink" class="btn btn-main-2">Processing<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
            </div>

        </form>
    </div>
</div>
