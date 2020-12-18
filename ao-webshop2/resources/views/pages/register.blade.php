@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>Register</h1>
                        </div>
                        <div class="col-12 form-group">
                                <form action="{{ route('register') }}" class="form"  method="POST"  >
                                        @csrf

                                        <label for="name">name</label>
                                        <input name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="name">
                                        @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

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

                                        <label for="password_confirmation">confirm password</label>
                                        <input name="password_confirmation" id="password_confirmation" type="password" class="@error('password') is-invalid @enderror form-control" placeholder="confirm password">
                                        @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                
                                        <input type="submit" value="Submit" class="btn btn-primary" >
                                </form>
                        </div>
                </div>
@endsection