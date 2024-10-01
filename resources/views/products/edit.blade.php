@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Products'])

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
                                <form role="form" method="POST" action="{{ route('products.update', $product) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Edit product</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- Name --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Title</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('title', $product->title) }}" name="title"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Image --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Image <img
                                                            src="{{ asset('images/' . $product->image) }}"
                                                            alt="Placeholder image"
                                                            style="width: 100px; position: absolute;transform: translate( 20px,-66%);"></label>
                                                    <input class="form-control" type="file" name="image">
                                                </div>
                                            </div>
                                            {{-- link --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Link</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('link', $product->link) }}" name="link"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Description --}}
                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label>Description</label>
                                                    <textarea class="w-100 height-100 form-control @error('content') is-invalid @enderror" id="service-description"
                                                        name="description" cols="30" rows="10" required>{{ $product->description }}</textarea>
                                                    @error('description')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- Arabic Description --}}

                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label>Arabic Description</label>
                                                    <textarea class="w-100 height-100 form-control @error('content') is-invalid @enderror" id="service-description"
                                                        name="description_ar" cols="30" rows="10" required>{{ $product->description_ar }}</textarea>
                                                    @error('description_ar')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 text-end">
                                        <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
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
