<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Analytics</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Analytics</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$views}}</h3>

                            <p>Views</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-eye"></i>
                        </div>
                        <a href="{{route('admin.all-media')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$downloads}}</h3>

                            <p>Downloads</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-download"></i>
                        </div>
                        <a href="{{route('admin.all-media')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$shares}}</h3>

                            <p>Shares</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-share"></i>
                        </div>
                        <a href="{{route('admin.all-media')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$likes}}</h3>

                            <p>Likes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <a href="{{route('admin.churches')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Members Links</span>
                            <span class="info-box-number">
                         {{$memberLinks}}<sup><small style="font-size: 70%;">{{$totalLinks}}</small></sup>
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Church Links</span>
                            <span class="info-box-number">{{$churchLinks}}<sup><small style="font-size: 70%;">{{$totalLinks}}</small></sup></span>
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
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-link"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Missionaries Link</span>
                            <span class="info-box-number">{{$missionaryLinks}}<sup><small style="font-size: 70%;">{{$totalLinks}}</small></sup></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-comments"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Comments</span>
                            <span class="info-box-number">{{$comments}}</span>
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
                                <div class="col-md-12" wire:ignore>
                                    <div id="chartContainer" style="height: 400px; max-width: 1140px; margin: 0px auto;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <br>
                            <div class="row">
                                <button class="btn btn-outline-success" wire:click="computeStat" style="margin-right: 10px;">
                                    <span wire:loading.remove wire:target="computeStat">Media Analytics</span>
                                    <span wire:loading wire:target="computeStat" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-outline-success" wire:click="computeMembers" style="margin-right: 10px;">
                                    <span wire:loading.remove wire:target="computeMembers">Members Record</span>
                                    <span wire:loading wire:target="computeMembers" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-outline-success" wire:click="computeChurches" style="margin-right: 10px;">
                                    <span wire:loading.remove wire:target="computeChurches">Churches Record</span>
                                    <span wire:loading wire:target="computeChurches" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-outline-success" wire:click="computeMissionaries" style="margin-right: 10px;">
                                    <span wire:loading.remove wire:target="computeMissionaries">Missionaries Record</span>
                                    <span wire:loading wire:target="computeMissionaries" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-outline-success" wire:click="computeGuests" style="margin-right: 10px;">
                                    <span wire:loading.remove wire:target="computeGuests">Guests Record</span>
                                    <span wire:loading wire:target="computeGuests" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title:{
                        text: "Top Performance Analytics",
                        fontWeight: "bold",
                        fontColor: "#008B8B",
                        fontfamily: "tahoma",
                        fontSize: 25,
                        padding: 10
                    },

                    data: [
                        {
                            type: "column",
                            dataPoints: [
                                @foreach($churches as $church)
                                {label: "{{$church->name}}", y: {{$loop->index}} },
                                @endforeach
                            ]
                        }

                    ]
                });

            chart.render();
        }
    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- /.content -->
</div>
