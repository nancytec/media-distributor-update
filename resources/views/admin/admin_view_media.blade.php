@extends('layouts.admin.app')

@section('content')
    @livewire('admin-view-media-page', ['media_id' => $media_id])
@endsection

