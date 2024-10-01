@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'consults'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="card mb-4">
                    <div class="card-header  ">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6>Free Consults</h6>
                            </div>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Service
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created at
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consults as $data)
                                            <tr>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $data->name }}</p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $data->email }}</p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $data->service }}</p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $data->created_at->format('d M Y - h:m') }}</p>
                                                </td>

                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                        <form action="{{ route('consults.destroy', $data) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('consults.show', $data) }}"
                                                                class="btn btn-info me-2">View</a>
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this consult?')">Delete</button>
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
