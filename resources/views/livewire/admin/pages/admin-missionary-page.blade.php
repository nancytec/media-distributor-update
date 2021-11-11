<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Missionaries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Missionaries</li>
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
                            <h4 wire:loading.remove wire:target="search" class="card-title">  @if($searchResult)  {{count($searchResult)}}  @else {{count($guests)}} @endif Missionaries</h4>
                            <h4 wire:loading wire:target="search" class="card-title">Searching... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
                        </div>
                        <input type="search" wire:model="search" class="form-control" placeholder="Search missionary"/>

                        <div class="card-body">
                            <div>
                                <div class="mb-2">

                                </div>
                            </div>
                            <div>
                                <div class="filter-container p-0 row">
                                    @if($guests)
                                        @foreach($guests as $guest)
                                            <div class="filtr-item col-sm-3" data-category="{{$guest->name}}" data-sort="{{$guest->name}} sample" style="text-align: center; margin-bottom: 40px;">
                                                <a href="{{route('admin.missionary-view', $guest->id)}}" data-title="sample 1 - white">
                                                    <img src="{{$guest->ImagePath}}" class="img-fluid mb-2" alt="white sample" style="width: 60%; border-radius: 20%; border: 2px solid #0c84ff;"/>
                                                </a><br>
                                                <small>{{$guest->name}}</small>
                                                <br>
                                            </div>
                                            <br>
                                        @endforeach
                                    @endif
                                </div>
                                @if(!$searchResult)
                                {{ $guests->links('components.pagination-links') /* For pagination links */}}
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
