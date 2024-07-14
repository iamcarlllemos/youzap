@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="w-50">
        <form action="#" method="post">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>
                </div>
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
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control">
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