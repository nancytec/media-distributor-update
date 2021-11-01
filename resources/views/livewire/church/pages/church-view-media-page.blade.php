<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Media Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('church.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('church.all-media')}}">Media</a></li>
                        <li class="breadcrumb-item active">{{$media->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-6">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">{{$media->name}}</h3>
                        </div>
                        <div class="card-body">

                            <!-- phone mask -->
                            <div class="form-group">
                                <p>{{strtoupper($media->type)}} Document Type:</p>
                                <a href="{{route('admin.media-view', $media->id)}}" data-title="sample 1 - white">
                                    <img src="{{asset("uploads/avatar/$media->type.png")}}" class="img-fluid mb-2" style="width: 50%;" alt="white sample"/>
                                </a>
                            </div>

                            <div class="form-group">
                                <button type="button" wire:click="showDistLinks" class="btn btn-outline-success">
                                    <span wire:loading.remove wire:target="showDistLinks">Generate Link</span>
                                    <span wire:loading wire:target="showDistLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <button type="button" wire:click="showTranslations" class="btn btn-outline-primary">
                                    <span wire:loading.remove wire:target="showTranslations">Translations</span>
                                    <span wire:loading wire:target="showTranslations" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- /.form group -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (left) -->


                {{--  For media Links for all the churches Alone--}}
                <div class="col-md-6">
                    @if($distLinks)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Refer links</h3>
                        </div>
                        <div class="card-body">

                                @if($churches)
                                    <div class="form-group">
                                        @foreach($churches as $church)
                                            <p>{{$loop->index +1}}.)  {{$church->name}}:
                                                <a target="_blank" href="{{env('REF_URL')}}/church_media/{{$media->id}}/{{$church->slug}}">
                                                    {{env('REF_URL')}}/church_media/{{$media->id}}/{{$church->slug}}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="form-group">
                                        <p class="text text-danger">No distributor Record found </p>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <button type="button" wire:click="hideDistLinks" class="btn btn-outline-danger"><span wire:loading.remove wire:target="hideDistLinks">Hide Links</span> <span wire:loading wire:target="hideDistLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                </div>
                        </div>
                        <div class="card-footer">
                            Visit <a target="_blank" href="https://loveworldbooks.com">Loveworld Books </a> for more information about
                            the distributors and the media links.
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    @endif
                    @if($translationSection)
                      <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Refer links - Translations</h3>
                                </div>
                                 <div class="card-body">
                                  @if($translations)
                                      <div class="form-group">
                                          @foreach($translations as $trans)
                                              <p>{{$loop->index +1}}.)  {{$trans->name}} {{$trans->language}}
                                                  <span wire:click="downloadTranslation({{$trans->id}})" style="cursor: pointer;" class="right badge badge-primary">Download</span>
                                              </p>
                                          @endforeach
                                      </div>
                                  @else
                                      <div class="form-group">
                                          <p class="text text-danger">No translation found </p>
                                      </div>
                                  @endif

                                  <div class="form-group">
                                      <button type="button" wire:click="showDistLinks" class="btn btn-outline-danger"><span wire:loading.remove wire:target="showDistLinks">Generate Links</span> <span wire:loading wire:target="showDistLinks" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                  </div>
                          </div>
                                <div class="card-footer">
                                    Visit <a target="_blank" href="https://loveworldbooks.com">Loveworld Books </a> for more information about
                                    the distributors and the media links.
                                </div>
                                <!-- /.card-body -->
                            </div>
                      <!-- /.card -->
                    @endif
                </div>
                <!-- /.col (right) -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
