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
                                <div class="row">
                                    <h6>{{ $support->name }}</h6>
                                    <div class=" col-md-12 text-end">
                                        <form action="{{ route('support.destroy', $support) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this {{ $support->email }} email?')">Delete</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p><strong><B>Details of {{ $support->email }} : </B></strong></p>
                                        <p><strong>Name :</strong> {{ $support->name }}</p>
                                        <p><strong>message :</strong> {!! $support->message !!}</p>
                                        @if ($support->file)
                                            <p><strong>Attachment file : </strong> <a
                                                    href="https://sa.pioneers.network/files/{{ $support->file }}">click
                                                    here</a>
                                        @endif
                                        <p><strong>Created at : </strong> {{ $support->created_at->format('d M Y - h:m') }}
                                        </p>
                                        <p><strong>replays : </strong></p>
                                        @php
                                            $index =0;
                                        @endphp
                                        @forelse ($replays as $replay )

                                        <p>{{++$index}} : {{$replay->message}}</p>
                                        @empty
                                        there arn't any replay
                                        @endforelse
                                    </div>

                                    <div class="d-flex justify-content-end gap-5 me-5">
                                        <div>
                                            <a href="{{ route('support.index') }}" class="btn btn-info">Back</a>
                                        </div>

                                        <div>
                                            <a href="{{ route('support.replay', $support) }}"
                                                class="btn btn-success">Replay</a>
                                        </div>
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
