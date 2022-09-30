
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            @if($media)
                <a href="#" class="h4">{{$media->name}}</a>
            @else
                <a href="#" class="h4">Media Not Found</a>
            @endif
        </div>

        @if($media)
            <div class="card-body">
                <p class="login-box-msg">Select audio language to download</p>

                <form wire:submit.prevent="download">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group" id="reservationdate" data-target-input="nearest">
                            <select wire:model="language" class="form-control {{$errors->has('language')? 'is-invalid' : '' }}">
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
                            </select>       <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-language"></i></div>
                            </div>
                        </div>
                        @error('language') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button type="button" wire:click="download" class="btn btn-primary">
                            <span wire:loading.remove wire:target="download">Download</span>
                            <span wire:loading wire:target="download" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                        {{--                        href="https://media.nowthatyouarebornagain.org/{{$preview_path}}.pdf"--}}
                        @if($trans_preview)
                            <button  type="button" data-toggle="modal" data-target="#modal-sm" class="btn btn-warning" >Preview</button>
                        @endif
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{route('download', $media->id)}}" style="margin-right: 35%;"><li class="fa fa-home"></li> Select Version</a>
                </p>
            </div>
        @else
            <div class="card-body">
                <p class="login-box-msg">Click share to generate your referral link</p>
                <p class="mb-1">
                    <a href="{{route('member.generate-media-link')}}" style="margin-right: 35%;"><li class="fa fa-share"></li> Share a copy</a>
                </p>
            </div>
    @endif

    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    @if($trans_preview)
                        <h4 class="modal-title">{{$trans_preview->language}} Translation</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($trans_preview)
                        <div style="text-align: center;">
                            <audio style="max-width: 80%;" src="http://127.0.0.1:8000/uploads/{{$trans_preview->path}}" controls></audio>
                        </div>
{{--                        <iframe--}}
{{--                            height="450"--}}
{{--                            style="border: 0; width: 100%;"--}}
{{--                            src="">--}}
{{--                        </iframe>--}}
                    @endif
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="download" class="btn btn-primary">
                        <span wire:loading.remove wire:target="download">Download</span>
                        <span wire:loading wire:target="download" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
