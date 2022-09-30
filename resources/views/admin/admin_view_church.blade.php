@extends('layouts.admin.app')

@section('content')
    @livewire('admin-view-church-page', ['church_id' => $church_id])
@endsection

