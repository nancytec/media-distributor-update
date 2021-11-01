@extends('layouts.church.app')

@section('content')
    @livewire('church-view-media-page', ['media_id' => $media_id])
@endsection

