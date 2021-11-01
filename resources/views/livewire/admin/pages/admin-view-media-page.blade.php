<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Media Information</h1>
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

                            <!-- phone mask -->
                            <div class="form-group">
                                <p>{{strtoupper($media->type)}} Document Type:</p>
                                <a href="{{route('admin.media-view', $media->id)}}" data-title="sample 1 - white">
                                    <img src="{{asset("uploads/avatar/$media->type.png")}}" class="img-fluid mb-2" style="width: 60%;" alt="white sample"/>
                                </a>
                            </div>

                            <div class="form-group">
                                <button type="button" wire:click="showDistLinks" class="btn btn-outline-success">
                                    <span wire:loading.remove wire:target="showDistLinks">Generate Link</span>
                                    <span wire:loading wire:target="showDistLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <a href="{{route('admin.media-translation', $media->id)}}" class="btn btn-outline-primary">Translations</a>
                                <button disabled type="button" wire:click="confirmDelete({{$media->id}})" class="btn btn-outline-danger float-right swal2-content">
                                    <span wire:loading.remove wire:target="delete">Delete</span>
                                    <span wire:loading wire:target="delete" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- /.form group -->

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
                            <h3 class="card-title">Distributors special links</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date -->
                            @if($distLinks)
                            <div class="form-group">
                                <label>Search:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="search" class="form-control " placeholder="Enter the church name"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                            </div>

                           @if($churches)
                            <div class="form-group">
                                @foreach($churches as $church)
                                <p>{{$loop->index +1}}.)  {{$church->name}}:
                                    <a href="{{env('REF_URL')}}/media/{{$media->id}}/{{$church->slug}}">
                                        {{env('REF_URL')}}/media/{{$media->id}}/{{$church->slug}}</a>
                                </p>
                                @endforeach
                            </div>
                            @else
                             <div class="form-group">
                                 <p class="text text-danger">No distributor Record found </p>
                              </div>
                            @endif


                            <div class="form-group">
                                <button type="button" wire:click="hideDistLinks" class="btn btn-outline-danger"><span wire:loading.remove wire:target="hideDistLinks">Hide Links</span> <span wire:loading wire:target="hideDistLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            Visit <a target="_blank" href="https://loveworldbooks.com">Loveworld Books </a> for more information about
                            the distributors and the media links.
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
