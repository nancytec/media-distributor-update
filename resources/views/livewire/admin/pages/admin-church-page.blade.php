<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Church</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Churches</li>
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
                            <h4 class="card-title">All Registered Churches</h4>
                            <span class="float-right">
                               <button  type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success" >Add Church</button>
                            </span>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="mb-2">
                                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle churches</a>
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
                                    @if($churches)
                                        @foreach($churches as $church)
                                            <div class="filtr-item col-sm-3" data-category="{{$church->name}}" data-sort="{{$church->name}} sample" style="text-align: center; margin-bottom: 40px;">
                                                <a href="{{route('admin.church-view', $church->id)}}" data-title="sample 1 - white">
                                                    <img src="{{$church->ImagePath}}" class="img-fluid mb-2" alt="white sample" style="width: 60%; border-radius: 50%; border: 2px solid #0c84ff;"/>
                                                </a><br>
                                                <small>{{$church->name}}</small>
                                                <br>
                                            </div>
                                            <br>
                                        @endforeach
                                    @endif
                                </div>
                                {{ $churches->links('components.pagination-links') /* For pagination links */}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    <div class="modal fade" id="modal-default" wire:ignore.self>
        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">New Church</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="card-body">
                            <p class="login-box-msg">Register a new church</p>

                            <form wire:submit.prevent="save">
                                <div class="input-group mb-3">
                                    <input type="text" wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                                <div class="input-group mb-3">
                                    <input type="email" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <div class="input-group mb-3">
                                    <input type="password" wire:model.lazy="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <div class="input-group mb-3">
                                    <input type="password" wire:model.lazy="c_password" class="form-control {{$errors->has('c_password')? 'is-invalid' : '' }}" placeholder="Retype password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('c_password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <div class="row">
                                    <div class="col-8">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary btn-block"> Register</button>
                                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary btn-block">  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button"  data-dismiss="modal" class="btn btn-primary">
                                <span wire:loading.remove wire:target="save">All Churches</span>
                                <span wire:loading wire:target="save" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</div>
