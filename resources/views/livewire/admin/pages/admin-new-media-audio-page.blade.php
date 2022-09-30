<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Upload Audio Version</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Upload media</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Media Details</h3>

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
                    <form wire:submit.prevent="uploadMedia">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Media Name" style="width: 100%;">
                                    @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Translation</label>
                                    <select class="form-control select2"  style="width: 100%;">
                                        <option selected="selected" value="English">English</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="media">Media file</label>
                                    <input type="file" id="media" wire:model.lazy="media" class="form-control {{$errors->has('media')? 'is-invalid' : '' }}" style="width: 100%;">
                                    @error('media') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <div class="form-group">
                            <button type="submit" wire:loading.remove wire:target="media" class="btn btn-outline-primary">
                                <span wire:loading.remove wire:target="uploadMedia">Upload</span>
                                <span wire:loading wire:target="uploadMedia" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                            <button wire:loading wire:target="media"  type="button" disabled class="btn btn-outline-success"> Optimizing media
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                        <!-- /.row -->
                    </form>
                </div>




                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
