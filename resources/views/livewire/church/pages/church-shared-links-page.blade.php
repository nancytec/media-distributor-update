<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shared Links</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('church.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Shared links</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" wire:loading wire:target="delete">
                            <h3 class="card-title">Removing Media</h3> &nbsp;
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        <div class="card-header" wire:loading.remove wire:target="delete">
                            <h3 class="card-title">All shared links</h3> &nbsp;
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>email</th>
                                    <th>link</th>
                                    <th>Created</th>
                                    <th><li class="fa fa-eye"></li></th>
                                    <th><li class="fa fa-share"></li></th>
                                    <th><li class="fa fa-thumbs-up"></li></th>
                                    <th><li class="fa fa-comments"></li></th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($links)
                                    @foreach($links as $link)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><a style="color: white;" href="{{route('church.members-link-view', $link->email)}}"> {{$link->name}} </a></td>
                                            <td><a style="color:white;" target="_blank" href="mailto:{{$link->email}}">{{$link->email}}</a> </td>
                                            <td><a style="color:white;" target="_blank" href="{{$link->link}}">{{$link->link}}</a></td>
                                            <td>{{$link->created_at->format('d M Y')}}</td>

                                            <td>{{count($link->views)}}</td>
                                            <td>{{$link->share->count}}</td>
                                            <td>{{count($link->likes)}}</td>
                                            <td>{{$link->download->count}}</td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            {{ $links->links('components.pagination-links') /* For pagination links */}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
