@extends('layouts.admin.app')

@section('content')
    @livewire('admin-view-guest-page', ['guest_id' => $guest_id])
@endsection

