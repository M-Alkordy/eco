@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Services'])

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
                                <form role="form" method="POST" action="{{ route('services.update', $service) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Edit Service</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- Name --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Title</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('title', $service->title) }}" name="title"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Name_ar --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Arabic
                                                        title</label>
                                                    <input class="form-control" type="text" name="title_ar"
                                                        value="{{ old('title_ar', $service->title_ar) }}" required="">
                                                </div>
                                            </div>
                                            {{-- Image --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Image <img
                                                            src="{{ asset('images/' . $service->image) }}"
                                                            alt="Placeholder image"
                                                            style="width: 100px; position: absolute;transform: translate( 20px,-66%);"></label>
                                                    <input class="form-control" type="file" name="image">
                                                </div>
                                            </div>
                                            {{-- description --}}
                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label>Description</label>
                                                    <textarea class="w-100 height-100 form-control @error('description') is-invalid @enderror" id="service-description"
                                                        name="description" cols="30" rows="10" required>{{ $service->description }}</textarea>
                                                    @error('content_en')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- description_ar --}}
                                            <div class="row mb-4 pe-0">
                                                <div class="col-sm-12 pe-0">
                                                    <label>Arabic description</label>
                                                    <textarea class=" w-100 height-100 form-control  @error('description') is-invalid @enderror" id="blog-description"
                                                        name="description_ar" required>{{ $service->description_ar }}</textarea>
                                                    @error('description')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 text-end">
                                        <a href="{{ route('services.index') }}" class="btn btn-info">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
