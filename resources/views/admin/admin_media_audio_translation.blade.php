@extends('layouts.admin.app')

@section('content')
    @livewire('admin-media-audio-translation-page', ['media_id' => $media_id])
@endsection

