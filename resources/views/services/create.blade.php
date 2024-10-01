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
                                <form role="form" method="POST" action="{{ route('services.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Create Services</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- Name_en --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Title</label>
                                                    <input class="form-control" type="text" name="title"
                                                        value="{{ old('title') }}" required="">
                                                </div>
                                            </div>
                                            {{-- Name_ar --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Arabic
                                                        title</label>
                                                    <input class="form-control" type="text" name="title_ar"
                                                        value="{{ old('title_ar') }}" required="">
                                                </div>
                                            </div>
                                            {{-- Image --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Image</label>
                                                    <input class="form-control" type="file" name="image"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- description_en --}}
                                            <div class="row mb-4 pe-0">
                                                <div class="col-sm-12 pe-0">
                                                    <label>description</label>
                                                    <textarea class=" w-100 height-100 form-control  @error('description') is-invalid @enderror" id="blog-description"
                                                        name="description" required>{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- description_ar --}}
                                            <div class="row mb-4 pe-0">
                                                <div class="col-sm-12 pe-0">
                                                    <label>Arabic description</label>
                                                    <textarea class=" w-100 height-100 form-control  @error('description') is-invalid @enderror" id="blog-description"
                                                        name="description_ar" required>{{ old('description_ar') }}</textarea>
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
