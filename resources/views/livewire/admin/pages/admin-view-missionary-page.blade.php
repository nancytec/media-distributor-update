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
                                     src="{{$guest->ImagePath}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$guest->name}}</h3>

                            <p class="text-muted text-center">{{$guest->email}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Joined</b> <a class="float-right">{{$guest->created_at->diffForHumans()}}</a>
                                </li>
                            </ul>

                            <a href="mailto:{{$guest->email}}" class="btn btn-primary btn-block"><b>Send Email</b></a>
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
                                <li style="margin-right: 20px;" class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Guest Details</a></li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="timeline">
                                    <!-- The timeline -->
                                    <p >Church: <span style="color: #0c84ff;">{{$guest->church_name}}</span></p>
                                    <p>Location: <span style="color: #0c84ff;">{{$guest->church_address}}</span></p>
                                    <button wire:click="deleteConfirm({{$guest->id}})" class="btn btn-danger">
                                        <span wire:loading.remove>Remove</span>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
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
