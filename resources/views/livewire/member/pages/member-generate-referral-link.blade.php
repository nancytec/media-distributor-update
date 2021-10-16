
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>USER</b>LINK</a>
        </div>

        @if($showGenerateLink)
        <div class="card-body">
            <p class="login-box-msg">Sign in to generate your link</p>
            <form wire:submit.prevent="generateLink" method="post">
                <div class="input-group mb-3">
                    <input type="text" required wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Your Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                <div class="input-group mb-3">
                    <input type="email" required wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror


                <div class="input-group mb-3">
                    <input required type="password" wire:model.lazy="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror


                <div class="input-group mb-3">
                    <input required type="password" wire:model.lazy="confirm_password" class="form-control {{$errors->has('confirm_password')? 'is-invalid' : '' }}" placeholder="Confirm your password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('confirm_password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror


                <div class="input-group mb-3">
                  <select wire:model.lazy="church" class="form-control {{$errors->has('church')? 'is-invalid' : '' }}">


                      <option value="">Select your church</option>
                        @if($churches)
                            @foreach($churches as $user)
                              <option value="{{$user->slug}}">{{$user->name}}</option>
                          @endforeach
                       @endif

                  </select>
                     <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-plus"></span>
                        </div>
                    </div>
                </div>
                @error('church') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror


                <div class="input-group mb-3">
                    <select wire:model.lazy="media" class="form-control {{$errors->has('media')? 'is-invalid' : '' }}">
                        <option value="">Select media</option>
                        @if($medias)
                            @foreach($medias as $file)
                                <option value="{{$file->id}}">{{$file->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-file"></span>
                        </div>
                    </div>
                </div>
                @error('media') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror




                <div class="row">
{{--                    <div class="col-8">--}}
{{--                        <div class="icheck-primary">--}}
{{--                            <input type="checkbox" id="remember">--}}
{{--                            <label for="remember">--}}
{{--                                Remember Me--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- /.col -->
                    <div class="col-12">
                        <button wire:loading.remove wire:target="generateLink" type="submit" class="btn btn-primary btn-block"> Generate Link</button>
                        <button disabled wire:loading wire:target="generateLink" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->
{{--            <p class="mb-1">--}}
{{--                <a href="{{route('reset')}}">I forgot my password</a>--}}
{{--            </p>--}}
        </div>
        @endif

     @if($showReferalLink)
        <div class="card-body">
            <p class="login-box-msg">Your Referral Link</p>
              <p class="mb-1" style="border: 1px solid rgba(19,27,225,0.5); padding: 10px;">
                  <a target="_blank" href="{{$referal_link}}">{{$referal_link}}</a>
              </p>
        </div>
    @endif
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


</div>
