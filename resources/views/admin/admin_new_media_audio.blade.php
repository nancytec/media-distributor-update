@extends('layouts.admin.app')

@section('content')
    @livewire('admin-new-media-audio-page', ['media_id' => $media_id])
@endsection

