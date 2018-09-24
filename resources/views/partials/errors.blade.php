@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{{ __('Whoops!') }}</strong> {{ __('Having some problems:') }}<br>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
