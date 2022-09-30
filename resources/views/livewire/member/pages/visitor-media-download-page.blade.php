
<div class="login-box">
    @if(!$docForm && ! $audioForm) 
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            @if($media)
                <a href="#" class="h4">{{$media->name}}</a>
            @else
                <a href="#" class="h4">Media Not Found</a>
            @endif
        </div>

        @if($media)
            <div class="card-body">
                <p class="login-box-msg">
                    Select version to download
                    <span wire:loading wire:target="version" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </p>

                <form wire:submit.prevent="download">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group" id="reservationdate" data-target-input="nearest">
                            <select wire:model="version" class="form-control {{$errors->has('version')? 'is-invalid' : '' }}">
                                <option value="">Select Version</option>
                                <option value="Document">PDF</option>
                                <option value="Audio">Audio</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-language"></i></div>
                            </div>
                        </div>
                        @error('version') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>

                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{route('member.generate-media-link')}}" style="margin-right: 35%;"><li class="fa fa-share"></li> Share a copy</a>
                </p>
            </div>
        @else
            <div class="card-body">
                <p class="login-box-msg">Click share to generate your referral link</p>
                <p class="mb-1">
                    <a href="{{route('member.generate-media-link')}}" style="margin-right: 35%;"><li class="fa fa-share"></li> Share a copy</a>
                </p>
            </div>
        @endif

        <!-- /.card-body -->
    </div>
    @endif

    @if($docForm)
        @livewire('visitor-media-doc-download-page', ['media_id' => $media->id])
    @endif

    @if($audioForm)
        @livewire('visitor-media-audio-download-page', ['media_id' => $media->id])
    @endif
</div>
