@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="w-50">
        <form action="#" method="post">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary float-end">Proceed</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection