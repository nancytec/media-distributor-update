<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Media</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">All Uploaded Media</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="btn-group w-100 mb-2">
                                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="mp3"> Audio </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="pdf"> Pdf </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="mp4"> Video </a>

                                </div>
                                <div class="mb-2">
                                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                                    <div class="float-right">
                                        <select class="custom-select" style="width: auto;" data-sortOrder>
                                            <option value="index"> Sort by Position </option>
                                            <option value="sortData"> Sort by Custom Data </option>
                                        </select>
                                        <div class="btn-group">
                                            <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                                            <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="filter-container p-0 row">
                                    @if($medias)
                                        @foreach($medias as $media)
                                            <div class="filtr-item col-sm-2" data-category="{{$media->type}}" data-sort="{{$media->type}} sample">
                                                <a href="{{route('admin.media-view', $media->id)}}" data-title="sample 1 - white">
                                                    <img src="{{asset("uploads/avatar/$media->type.png")}}" class="img-fluid mb-2" alt="white sample"/>
                                                </a>
                                                <small>{{$media->name}}</small>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
