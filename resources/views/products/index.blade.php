@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Products'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="card mb-4">
                    <div class="card-header  ">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-10">
                                    <span>
                                        @if (session($key ?? 'status'))
                                            <div class="alert alert-secondary" role="alert">
                                                <strong>{{ session($key ?? 'status') }}</strong>
                                            </div>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6>Products</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('products.create') }}" class="btn btn-success me-2" style="">Add
                                    Products</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Title
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Link
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"></h6>
                                                            <img src="{{ asset('images/' . $product->image) }}"
                                                                alt="Placeholder image" width="50" height="50">
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $product->title }}</p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $product->description }}</p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $product->link }}</p>
                                                </td>

                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                        <form action="{{ route('products.destroy', $product) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('products.show', $product) }}"
                                                                class="btn btn-info me-2">View</a>
                                                            <a href="{{ route('products.edit', $product) }}"
                                                                class="btn btn-primary me-2">Edit</a>
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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
