@extends('layouts.church.app')

@section('content')
    @livewire('church-members-link-view-page', ['member_email' => $member_email])
@endsection

