@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Users'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form role="form" method="POST" action={{ route('users.store') }}>
                                    @csrf

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">ADD User</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">User Information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Username</label>
                                                    <input class="form-control" type="text" name="username"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Email
                                                        address</label>
                                                    <input class="form-control" type="email" name="email"
                                                        required="">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Password</label>
                                                    <input class="form-control" type="text" name="password"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Address</label>
                                                    <input class="form-control" type="text" name="address"
                                                        required="">
                                                </div>
                                            </div>

                                            <hr class="horizontal dark">
                                            <p class="text-uppercase text-sm">Contact Information</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Role Name </strong>
                                                        <select name="roles_name[]" multiple class="form-control">
                                                            @foreach ($roles as $role)
                                                            <option value={{$role}}>{{$role}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('users.index') }}" class="btn btn-info">Back</a>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
