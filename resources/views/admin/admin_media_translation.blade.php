@extends('layouts.admin.app')

@section('content')
    @livewire('admin-media-translation-page', ['media_id' => $media_id])
@endsection

