@extends('layouts.app')

@section('content')
    <form action="/logout" method="post">
        @csrf
        @method('POST')
        <button type="submit">Logout</button>
    </form>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-md-4">
                @livewire('profile')
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        @livewire('random-connection')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

