<p>{{ __('Hello!') }}</p>
<p>{{ __('lng.invite.mail_welcome', ['inviter'=>$inviter, 'site'=>$site]) }}</p>
@if ($message_text !='')
    <p>
        {{ $message_text }}
    </p>
@endif
<p>
    {{ __('lng.invite.mail_click') }}
    <a href="{{ route('register', ['invite_token'=>$invite_token]) }}" target="_blank">{{ route('register', ['invite_token'=>$invite_token]) }}</a>
</p>