<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Members</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('church.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Church members</li>
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
                            <h3 class="card-title">All Members</h3> &nbsp;
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Date Created</th>
                                    <th>MediaNo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($members)
                                    @foreach($members as $member)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>{{$member->name}}</td>
                                            <td><a target="_blank" href="mailto:{{$member->email}}">{{$member->email}}</a> </td>
                                            <td>{{$member->created_at->format('d M Y')}}</td>
                                            <td>{{count($member->media)}}</td>
                                            <td>
                                                <p>
                                                    <a class="btn btn-primary" href="{{route('church.members-view', $member->id)}}" >View</a>
                                                </p>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            {{ $members->links('components.pagination-links') /* For pagination links */}}
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
