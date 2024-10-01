@component('mail::message')
    Name: {{ $name }} <br>
    Email: {{ $email }}<br>
    Message:{{ $mess }}
    @if ($file)
        @component('mail::button', ['url' => $file])
            Attachment file
        @endcomponent
    @endif
@endcomponent
