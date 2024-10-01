@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Roles'])

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
                                <form role="form" method="POST" action={{ route('roles.store') }}>
                                    @csrf

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">ADD Roles</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">User Information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    <input type="text" name="name" placeholder="Name"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Permissions List</p>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Permission:</strong>
                                                    <br />
                                                    @foreach ($permission as $value)
                                                        <label><input type="checkbox" name="permission[]"
                                                                value={{ $value->id }} class = "name">
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('roles.index') }}" class="btn btn-info">Back</a>
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
