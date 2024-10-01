@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Technical Support'])

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
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p><strong><B>to : {{ $support->email }} </B></strong></p>
                                        <p><strong>message :</strong> {!! $support->message !!}</p>
                                        @if ($support->file)
                                            <p><strong>Attachment file : </strong> <a
                                                    href="https://sa.pioneers.network/files/{{ $support->file }}">click
                                                    here</a></p>
                                        @endif
                                    </div>
                                    <form action="{{ route('support.send', $support) }}" method="post">
                                        @csrf
                                        <textarea name="message" class="w-75 d-block mx-auto" rows="10"></textarea>
                                        <div class="d-flex justify-content-end gap-5 me-5 mt-3">
                                            <div>
                                                <a href="{{ route('support.index') }}" class="btn btn-info">Back</a>
                                            </div>
                                            <button type="submit" class="btn btn-success">Replay</button>
                                        </div>
                                    </form>

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
