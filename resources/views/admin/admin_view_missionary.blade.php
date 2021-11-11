@extends('layouts.admin.app')

@section('content')
    @livewire('admin-view-missionary-page', ['missionary_id' => $missionary_id])
@endsection

