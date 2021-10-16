<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Church Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-link"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Shared links</span>
                            <span class="info-box-number">
                  {{$totalLinks}}
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Members</span>
                            <span class="info-box-number">{{$totalMembers}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Most Viewed</span>
                            <span class="info-box-number"><small>{{$mostViewed->name}} ({{$mostViewed->views}})</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-share-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Most Shared</span>
                            <span class="info-box-number"><small>{{$mostShared->name}} ({{$mostShared->shares}})</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Monthly Recap Report</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-center">
                                        <strong>Recently Registered Members</strong>
                                    </p>
                                    @if($recentMembers)
                                        @foreach($recentMembers as $member)
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        {{$member->name}}
                                        <span class="float-right"><small style="">{{$member->email}} | &nbsp; &nbsp;</small> shared: {{count($member->media)}} | <small>{{$member->created_at->diffForHumans()}}</small></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                                        </div>
                                    </div>
                                        @endforeach
                                    <!-- /.progress-group -->
                                    @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <p class="text-center">
                                        <strong>Most Shared Medias</strong>
                                    </p>

                                    @if($mostSharedMedias)
                                        @foreach($mostSharedMedias as $media)
                                    <div class="progress-group">
                                        {{$media->name}}
                                        <span class="float-right"><li class="fa fa-share"></li> {{$media->shares}} / <li class="fa fa-eye"></li> {{$media->views}} </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar-striped
                                             @if($loop->index == '0')  bg-success
                                            @endif

                                            @if($loop->index == '1')  bg-primary
                                            @endif

                                            @if($loop->index == '2')  bg-warning
                                            @endif
                                            @if($loop->index == '3')  bg-danger
                                            @endif


                                            " style="width: 100%"></div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                    <!-- /.progress-group -->

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
