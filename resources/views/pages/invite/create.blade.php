@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @include('partials.close_back_button')
                        {{ __('app.invite.invite_new_user') }}
                    </div>
                    <div class="card-body">
                        
                        @include('partials.errors')
                        
                        <form method="POST" action="{{ route('invite.store') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       aria-describedby="emailHelp"
                                       placeholder="{{ __('Enter email') }}"
                                       value="{{ old('email') }}">
                                <small id="emailHelp" class="form-text text-muted">{{ __('app.invite.email_help') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="message">{{ __('Message') }}</label>
                                <textarea class="form-control"
                                          name="message"
                                          rows="8">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('app.invite.button') }}</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection