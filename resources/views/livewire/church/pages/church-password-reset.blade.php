<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1">Reset</a>
        </div>

        @if($showResetForm)
        <div class="card-body">
            <p class="login-box-msg">Enter your registered Email</p>
            <form wire:submit.prevent="getCode" method="post">
                <div class="input-group mb-3">
                    <input type="email" required wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button wire:loading.remove wire:target="getCode" type="submit" class="btn btn-primary btn-block"> Proceed</button>
                        <button disabled wire:loading wire:target="getCode" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('church.login')}}">Back to login</a>
            </p>
        </div>
        @endif

        @if($showTokenForm)
        <div class="card-body">
            <p class="login-box-msg">Reset token sent to your email</p>
            <form wire:submit.prevent="verifyToken" method="post">
                <div class="input-group mb-3">
                    <input type="text" required wire:model.lazy="token" class="form-control {{$errors->has('token')? 'is-invalid' : '' }}" placeholder="Enter reset token">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-edit"></span>
                        </div>
                    </div>
                </div>
                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button wire:loading.remove wire:target="verifyToken" type="submit" class="btn btn-primary btn-block"> Proceed</button>
                        <button disabled wire:loading wire:target="verifyToken" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('church.login')}}">Back to login</a>
            </p>
        </div>
        @endif

        @if($showChoosePass)
        <div class="card-body">
            <p class="login-box-msg">Choose a new password</p>
            <form wire:submit.prevent="updatePass" method="post">
                <div class="input-group mb-3">
                    <input type="password" required wire:model.lazy="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" placeholder="Choose password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="input-group mb-3">
                    <input type="password" required wire:model.lazy="password_confirmation" class="form-control {{$errors->has('password_confirmation')? 'is-invalid' : '' }}" placeholder="Confirm password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password_confirmation') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button wire:loading.remove wire:target="updatePass" type="submit" class="btn btn-primary btn-block"> Proceed</button>
                        <button disabled wire:loading wire:target="updatePass" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('church.login')}}">Back to login</a>
            </p>
        </div>
        @endif
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
