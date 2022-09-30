<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Media Translations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.all-media')}}">Media</a></li>
                        <li class="breadcrumb-item active">{{$media->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-6">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">{{$media->name}}</h3>
                        </div>
                        <div class="card-body">

                            <form wire:submit.prevent="uploadTranslation">

                            <div class="form-group">
                                <p>{{strtoupper($media->type)}} Document Type Preferred.</p>
                                <div class="input-group" id="reservationdate" data-target-input="nearest">

                                    {{-- <select wire:model.lazy="language" class="form-control {{$errors->has('language')? 'is-invalid' : '' }}"> --}}

                                        <div class="form-group">
                                            <div class="input-group" >
                                                <input type="text" id="language"  placeholder="Enter Language" wire:model.lazy="language" class="form-control {{$errors->has('language')? 'is-invalid' : '' }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-language"></i></div>
                                                </div>
                                            </div>
                                            @error('language') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                        </div>



                                </div>
                                @error('language') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group" id="reservationdate" data-target-input="nearest">
                                    <input type="file" id="media" wire:model.lazy="media_file" class="form-control {{$errors->has('media_file')? 'is-invalid' : '' }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-file"></i></div>
                                    </div>
                                </div>
                                @error('media_file') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" wire:loading.remove wire:target="media_file" class="btn btn-outline-success">
                                    <span wire:loading.remove wire:target="uploadTranslation">Upload Translation</span>
                                    <span wire:loading wire:target="uploadTranslation" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button wire:loading wire:target="media_file"  type="button" disabled class="btn btn-outline-success"> Optimizing media
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>


                                <button type="button" wire:click="showTranslations" class="btn btn-outline-primary float-right">
                                    <span wire:loading.remove wire:target="showTranslations">Show Translation</span>
                                    <span wire:loading wire:target="showTranslations" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- /.form group -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col (left) -->








                {{--  For media Links for all the churches Alone--}}
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><span wire:loading.remove wire:target="translationSearch">Available media translations </span>
                                <span  wire:loading wire:target="translationSearch">
                                   Searching <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </span>
                            </h3>
                            <input type="search" placeholder="Search translation" wire:model="translationSearch" class="form-control" />
                        </div>
                        <div class="card-body">
                            <!-- Date -->
                          @if($translationSection)
                                @if($translations)
                                    <div class="form-group">
                                        @foreach($translations as $trans)
                                            <p>{{$loop->index +1}}.)  {{$trans->name}} {{$trans->language}}
                                                <span wire:click="downloadTranslation({{$trans->id}})" style="cursor: pointer;" class="right badge badge-primary">Download</span>
                                                <span wire:click="deleteConfirm({{$trans->id}})" style="cursor: pointer;" class="right badge badge-danger">Delete</span>
                                            </p>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="form-group">
                                        <p class="text text-danger">No translation found </p>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <button type="button" wire:click="hideTranslations" class="btn btn-outline-danger"><span wire:loading.remove wire:target="hideTranslations">Hide Links</span> <span wire:loading wire:target="hideTranslations" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                </div>
                          @endif
                        </div>
                        <div class="card-footer">
                            Visit <a target="_blank" href="https://loveworldbooks.com">Loveworld Books </a> for more information about
                            the Media books and the translations.
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (right) -->





            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
