

<div class="register-box" style="margin: auto; margin-top: 150px;">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <p class="login-box-msg">Register a new member</p>

            <form wire:submit.prevent="save">
                <div class="input-group mb-3">
                    <input type="text" wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="input-group mb-3">
                    <input type="email" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                <div class="input-group mb-3">
                    <input type="password" wire:model.lazy="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                <div class="input-group mb-3">
                    <input type="password" wire:model.lazy="c_password" class="form-control {{$errors->has('c_password')? 'is-invalid' : '' }}" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('c_password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                <div class="row">
                    <div class="col-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary btn-block"> Register</button>
                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="{{route('member.generate-media-link')}}" target="_blank" class="text-center">Generate link directly</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
