@extends('layouts.church.app')

@section('content')
    @livewire('church-members-view-page', ['member_id' => $member_id])
@endsection

