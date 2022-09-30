<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Audio Translations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.all-media')}}">Media</a></li>
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

                            <form wire:submit.prevent="uploadTranslation">

                                <div class="form-group">
                                    <p>{{strtoupper($media->type)}} Document Type Preferred.</p>
                                    <div class="input-group" id="reservationdate" data-target-input="nearest">
                                        <select wire:model.lazy="language" class="form-control {{$errors->has('language')? 'is-invalid' : '' }}">
                                            <option value="">Select Language</option>
                                            <option value="English">English</option>
                                            <option value="Acholi">Archoli</option>
                                            <option value="Afrikaans">Afrikaans</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Benbe">Bemba</option>
                                            <option value="Bende">Bende</option>
                                            <option value="Brazilian portuguese">Brazilian portuguese</option>
                                            <option value="Bwile">Bwile</option>
                                            <option value="Cantonese">Cantonese</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Chigarwe">Chigarwe</option>
                                            <option value="Chikunda">Chikunda</option>
                                            <option value="Chin">Chin</option>
                                            <option value="Chitembo">Chitembo</option>
                                            <option value="Drc French">Drc French</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="Edo">Edo</option>
                                            <option value="English">English</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ewe">Ewe</option>
                                            <option value="Farsi">Farsi</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Filipino">Filipino</option>
                                            <option value="Finnish">Finnish</option>
                                            <option value="French">French</option>
                                            <option value="Ga">Ga</option>
                                            <option value="German">German</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Hangaza">Hangaza</option>
                                            <option value="Havu">Havu</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Hungarian">Hungarian</option>
                                            <option value="Igala">Igala</option>
                                            <option value="Igbo">Igbo</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Jamaica patwah">Jamaican patwah</option>
                                            <option value="Jamaican">Jamaican</option>


                                            <option value="Kannada">Kannada</option>
                                            <option value="Kazakh">Kazakh</option>
                                            <option value="Lithuanian">Lithuanian</option>
                                            <option value="Icelandic">Icelandic</option>
                                            <option value="Kyrgyz">Kyrgyz</option>
                                            <option value="Luxembourgish">Luxembourgish</option>
                                            <option value="Macedonian">Macedonian</option>
                                            <option value="Maltese">Maltese</option>
                                            <option value="Sikwasilonga">Sikwasilonga</option>
                                            <option value="Siliokwe">Siliokwe</option>
                                            <option value="Croatian">Croatian</option>
                                            <option value="Czech">Czech</option>
                                            <option value="Danish">Danish</option>
                                            <option value="Frisian">Frisian</option>
                                            <option value="Galicain">Galicain</option>
                                            <option value="Georgian">Georgian</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option value="Haitian Creole">Haitian Creole</option>
                                            <option value="Hawaiian">Hawaiian</option>
                                            <option value="Hmong">Hmong</option>
                                            <option value="Nepali">Nepali</option>



                                            <option value="Kikinga">Kikinga</option>
                                            <option value="Kinyarwanda">Kinyarwanda</option>
                                            <option value="Kirundi">Kirundi</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Korekore">Korekore</option>
                                            <option value="Kswahili">Kswahili</option>
                                            <option value="Lima">Lima</option>
                                            <option value="Lozi">Lozi</option>
                                            <option value="Luba">Luba</option>
                                            <option value="Luganda">Luganda</option>
                                            <option value="Malagasy">Malagasy</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Mandarin">Mandarin</option>
                                            <option value="Mankon">Mankon</option>
                                            <option value="Manyika">Manyika</option>
                                            <option value="Marathi">Marathi</option>
                                            <option value="Moghamo">Moghamo</option>
                                            <option value="Mongolian">Mongolian</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Ndebele">Ndebele</option>
                                            <option value="Ngindo">Ngindo</option>
                                            <option value="Ngoni">Ngoni</option>
                                            <option value="Nkewen">Nkewen</option>
                                            <option value="Nuer">Nuer</option>
                                            <option value="Odiya">Odiya</option>
                                            <option value="Oshiwambo">Oshiwambo</option>
                                            <option value="Otijherero">Otijherero</option>
                                            <option value="Pimbwe">Pimbwe</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Sesotho">Sesotho</option>
                                            <option value="Setswana">Setswana</option>
                                            <option value="Shi">Shi</option>
                                            <option value="Shlia">Shlia</option>
                                            <option value="Shona">Shona</option>
                                            <option value="Sinhala">Sinhala</option>
                                            <option value="Siswati">Siswati</option>
                                            <option value="Slovak">Slovak</option>
                                            <option value="South America Spanish">South America Spanish</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="Swedish">Swedish</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Thumbuka">Thumbuka</option>
                                            <option value="Tiv">Tiv</option>
                                            <option value="Tonga Zambia">Tonga Zambia</option>
                                            <option value="Tongan">Tongan</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Twi">Twi</option>
                                            <option value="Ukrain">Ukrain</option>
                                            <option value="Ushi">Ushi</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yoruba">Yoruba</option>
                                            <option value="Zambia-Swahili">Zambian Swahili</option>
                                            <option value="Zulu">Zulu</option>
                                            <option value="NKWEN">NKWEN</option>
                                     <option value="NGONI">NGONI</option>
                                     <option value="MOGHAMO">MOGHAMO</option>
                                     <option value="MANKON">MANKON</option>
                                     <option value="LUUNDA LUAPULA">LUUNDA LUAPULA</option>
                                     <option value="LUBA">LUBA</option>
                                     <option value="LIMA">LIMA</option>
                                     <option value="LAWNGTLANG">LAWNGTLANG</option>
                                     <option value="KWANDI">KWANDI</option>
                                     <option value="CHITEMBO">CHITEMBO</option>
                                     <option value="KHUMI">KHUMI</option>
                                     <option value="BABANKI">BABANKI</option>
                                     <option value="HMAWNGTLAN">HMAWNGTLAN</option>
                                    <option value="BWILE">BWILE</option>
                                    <option value="WAWE">WAWE</option>
                                    <option value="TEDIM">TEDIM</option>
                                    <option value="NKOYA">NKOYA</option>
                                    <option value="MUBULELI">MUBULELI</option>
                                    <option value="LUVALE">LUVALE</option>
                                    <option value="LUNDU">LUNDU</option>
                                    <option value="KEDJOM">KEDJOM</option>
                                    <option value="KAONDE">KAONDE</option>
                                    <option value="KABENDE">KABENDE</option>
                                    <option value="CHITEMBO DRC CONGO">CHITEMBO DRC CONGO</option>
                                    <option value="TONGA ZAMBIA">TONGA ZAMBIA</option>
                                    <option value="USHI">USHI</option>
                                    <option value="ZAMBIAN SWAHILI">ZAMBIAN SWAHILI</option>
                                    <option value="TOK PIDGIN">TOK PIDGIN</option>
                                    <option value="TABWA">TABWA</option>
                                    <option value="SHLIA">SHLIA</option>
                                    <option value="SENGA">SENGA</option>
                                    <option value="NYANGALI">NYANGALI</option>
                                    <option value="NYANGA">NYANGA</option>
                                    <option value="HUNDE (DRC)">HUNDE (DRC)</option>
                                    <option value="ZOTUNG">ZOTUNG</option>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-language"></i></div>
                                        </div>
                                    </div>
                                    @error('language') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group" id="reservationdate" data-target-input="nearest">
                                        <input type="file" id="media" wire:model.lazy="media_file" class="form-control {{$errors->has('media_file')? 'is-invalid' : '' }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-file"></i></div>
                                        </div>
                                    </div>
                                    @error('media_file') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" wire:loading.remove wire:target="media_file" class="btn btn-outline-success">
                                        <span wire:loading.remove wire:target="uploadTranslation">Upload Translation</span>
                                        <span wire:loading wire:target="uploadTranslation" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                    <button wire:loading wire:target="media_file"  type="button" disabled class="btn btn-outline-success"> Optimizing media
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" wire:loading.remove wire:target="media" wire:click="deleteAudioConfirm({{$media->id}})" class="btn btn-outline-danger">
                                        <span wire:loading.remove wire:target="deleteAudioConfirm">Remove Audio</span>
                                        <span wire:loading wire:target="deleteAudioConfirm" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" wire:click="showTranslations" class="btn btn-outline-primary float-right">
                                        <span wire:loading.remove wire:target="showTranslations">Show Translation</span>
                                        <span wire:loading wire:target="showTranslations" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <!-- /.form group -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col (left) -->


                {{--  For media Links for all the churches Alone--}}
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Available media translations</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date -->
                            @if($translationSection)
                                @if($translations)
                                    <div class="form-group">
                                        @foreach($translations as $trans)
                                            <p>{{$loop->index +1}}.)  {{$trans->name}} {{$trans->language}}
                                                <span wire:click="downloadTranslation({{$trans->id}})" style="cursor: pointer;" class="right badge badge-primary">Download</span>
                                                <span wire:click="deleteConfirm({{$trans->id}})" style="cursor: pointer;" class="right badge badge-danger">Delete</span>
                                            </p>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="form-group">
                                        <p class="text text-danger">No translation found </p>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <button type="button" wire:click="hideTranslations" class="btn btn-outline-danger"><span wire:loading.remove wire:target="hideTranslations">Hide Links</span> <span wire:loading wire:target="hideTranslations" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            Visit <a target="_blank" href="https://loveworldbooks.com">Loveworld Books </a> for more information about
                            the Media books and the translations.
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (right) -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
