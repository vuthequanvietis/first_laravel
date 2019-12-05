@extends('layouts.app')
@section('content')
    <div class="col-4 offset-4 mt-5">
        <p class="text-center">{{ __('message.contact') }}</p>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('label.name') }}</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>
            <div class="form-group">
                <label for="email">{{ __('label.email') }}</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="address">{{ __('label.address') }}</label>
                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="content">{{ __('label.content') }}</label>
                <textarea type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">{{ __('label.send') }}</button>
            </div>
        </form>
    </div>
@endsection

