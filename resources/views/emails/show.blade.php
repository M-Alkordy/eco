@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'emails'])

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
                                    <h6>{{ $email->title }}</h6>
                                    <div class=" col-md-12 text-end">
                                        <form action="{{ route('emails.destroy', $email) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this {{ $email->email }} email?')">Delete</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p><strong><B>Details of {{ $email->email }} : </B></strong></p>
                                        <p><strong>Name :</strong> {{ $email->name }}</p>
                                        <p><strong>service :</strong> {!! $email->service !!}</p>
                                        <p><strong>message :</strong> {!! $email->message !!}</p>
                                        <p><strong>Created at : </strong> {{ $email->created_at->format('d M Y - h:m') }}
                                        </p>

                                    </div>

                                    <div class=" col-md-11 text-end">
                                        <a href="{{ route('emails.index') }}" class="btn btn-info"
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
