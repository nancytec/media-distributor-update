@extends('layouts.admin.app')

@section('content')
    @livewire('admin-view-member-page', ['member_id' => $member_id])
@endsection

