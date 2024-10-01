@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Services'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div id="alert">
                    @include('components.alert')
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-10">
                        <div class="card mb-4">
                            <div class="card-header  ">
                                <div class="row">
                                    <h6>{{ $service->title }}</h6>
                                    <div class=" col-md-12 text-end">
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-success"
                                            style="">
                                            Edit</a>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this {{ $service->title }} Service?')">Delete</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p style="text-align-last: center">
                                            <img src="{{ asset('images/' . $service->image) }}" alt="Placeholder image"
                                                width="400" height="400">
                                        </p>
                                        <p><strong><B>Details of {{ $service->title }} : </B></strong></p>
                                        <p><strong>Title :</strong> {{ $service->title }}</p>
                                        <p><strong>Description :</strong> {!! $service->description !!}</p>
                                        <p><strong>Arabic title :</strong> {{ $service->title_ar }}</p>
                                        <p><strong>Description_ar :</strong> {!! $service->description_ar !!}</p>
                                        <p><strong>Created at : </strong> {{ $service->created_at->format('d M Y - h:m') }}
                                        </p>

                                    </div>

                                    <div class=" col-md-11 text-end">
                                        <a href="{{ route('services.index') }}" class="btn btn-info"
                                            style="margin-left: 150px">Back</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
