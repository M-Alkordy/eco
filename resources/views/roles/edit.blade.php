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
                                <form role="form" method="POST" action={{ route('roles.update', $role->id) }}>
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Edit Roles</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Role Information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Role Name:</strong>
                                                    <input type="text" name="name" placeholder="Name"
                                                        class="form-control" value={{ $role->name }}>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Permissions List</p>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <ul id="treeview1">
                                                    <li><a href="#">Permissions: </a>
                                                        <ul>

                                                            @foreach ($permission as $value)
                                                                <li>
                                                                    <label><input type="checkbox" name="permission[]"
                                                                        value={{ $value->id }}
                                                                        @foreach ($rolePermissions as $rolePermission)
                                                                        @if ($rolePermission == $value->id)
                                                                            checked
                                                                        @endif @endforeach
                                                                        class = "name">
                                                                    {{ $value->name }}</label>
                                                                    <br />
                                                                </li>
                                                            @endforeach


                                                        </ul>
                                                    </li>
                                                </ul>
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
