@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Users'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="card mb-4">
                    <div class="card-header  ">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6>Users</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('users.create') }}" class="btn btn-success me-2" style="">Add New
                                    User</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Role
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                email</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $v }}</h6>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $user->email }}</p>
                                                </td>


                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                        <a href="{{ route('users.show', $user) }}"
                                                            class="btn btn-info me-2">View</a>
                                                        <a href="{{ route('users.edit', $user) }}"
                                                            class="btn btn-primary me-2">Edit</a>
                                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
