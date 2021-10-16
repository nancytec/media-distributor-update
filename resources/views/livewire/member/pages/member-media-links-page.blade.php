<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('member.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Media links</li>
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
                        <div class="card-header">
                            <h3 class="card-title"  wire:loading.remove >Published Media links</h3> &nbsp;
                            <h3 class="card-title"  wire:loading>Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h3> &nbsp;
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Date Created</th>
                                    <th><li class="fa fa-eye"></li></th>
                                    <th><li class="fa fa-share"></li></th>
                                    <th><li class="fa fa-thumbs-up"></li></th>
                                    <th><li class="fa fa-download"></li></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($links)
                                    @foreach($links as $link)
                                        @if($link->media)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{$link->media->name}}</td>
                                                <td><a target="_blank" href="{{$link->link}}">{{$link->link}}</a> </td>
                                                <td>{{$link->created_at->format('d M Y')}}</td>
                                                <td>{{count($link->views)}}</td>
                                                <td>{{$link->share->count}}</td>
                                                <td>{{count($link->likes)}}</td>
                                                <td>{{$link->download->count}}</td>
                                                <td>
                                                    <p>
                                                        <button wire:click="deleteConfirm({{$link->id}})" type="button" class="btn btn-danger">Remove</button>
                                                    </p>
                                                </td>
                                            </tr>
                                        @else
                                        @endif


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
