@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>Login</h1>
                        </div>
                        <div class="col-12 form-group">
                                <form action="{{ route('authenticate') }}" class="form"  method="POST"  >
                                        @csrf

                                        <label for="email">email</label>
                                        <input name="email" id="email" type="text" class="@error('email') is-invalid @enderror form-control" placeholder="email">
                                        @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="password">password</label>
                                        <input name="password" id="password" type="password" class="@error('password') is-invalid @enderror form-control" placeholder="password">
                                        @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                
                                        <input type="submit" value="Submit" class="btn btn-primary" >
                                </form>
                        </div>
                </div>
@endsection