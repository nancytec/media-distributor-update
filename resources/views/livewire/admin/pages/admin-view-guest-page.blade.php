<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guest Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('church.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.guests')}}">Guests</a></li>
                        <li class="breadcrumb-item active">{{$guest->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{$church->ImagePath}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$church->name}}</h3>

                            <p class="text-muted text-center">{{$church->email}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Members</b> <a class="float-right">{{count($church->members)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Medias</b> <a class="float-right">{{count($church->medias)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined</b> <a class="float-right">{{$church->created_at->diffForHumans()}}</a>
                                </li>
                            </ul>

                            <a href="mailto:{{$church->email}}" class="btn btn-primary btn-block"><b>Send Email</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li style="margin-right: 20px;" wire:click="showSharedLinks" class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab"><span wire:loading.remove wire:target="showSharedLinks">Shared Media Links</span> <span wire:loading wire:target="showSharedLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </a></li>
                                <li wire:click="showMembers" class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab"><span wire:loading.remove wire:target="showMembers">Registered Members</span> <span wire:loading wire:target="showMembers" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </a></li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                            <span class="bg-primary">
                                               Shared: @if($church->medias) {{count($church->medias)}} @else 0 @endif
                                            </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-link bg-primary"></i>


                                                @if($church->medias)
                                                    @foreach($church->medias as $media)
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="far fa-clock"></i> {{$media->created_at->diffForHumans()}}</span>

                                                            <h3 class="timeline-header"><a href="#">Media Name:</a> {{$media->media->name}}</h3>

                                                            <div class="timeline-body">
                                                                {{$media->link}}
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a target="_blank" href="{{env("REF_URL")}}/{{$media->link}}" class="btn btn-primary btn-sm">Visit link</a>
                                                                <a href="#" wire:click="deleteConfirm({{$media->id}})" class="btn btn-danger btn-sm">Delete</a>
                                                                <span class="float-right">
                                                         <a href="#" class="link-black text-sm mr-2"><i class="fas fa-eye mr-1"></i> {{count($media->views)}}</a>
                                                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> {{$media->share->count}}</a>
                                                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> {{count($media->likes)}} </a>&nbsp;
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="fas fa-download mr-1"></i> {{$media->download->count}} &nbsp;
                                                        </a>
                                                     </span>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.tab-pane -->


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
