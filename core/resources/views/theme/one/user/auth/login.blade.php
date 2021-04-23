@extends('theme.one.layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card pt-5">
                <div class="card-header">
                    <h2 class="card-title">User Login</h2>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{route('user.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="form-group col-6 text-right">
                                <a href="{{ route('user.password.request') }}">Reset Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection