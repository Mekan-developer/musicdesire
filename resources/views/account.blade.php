@extends('layouts.base')
@section('content')
    <div class="account">
        @livewire('user-profile')
        @livewire('favorite-tracks')
        @livewire('ordered-tracks')
        
    {{-- </div> --}}
    @include('components.player')
</div>

    
@endsection
