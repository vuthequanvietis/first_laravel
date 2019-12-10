@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="text-center">{{ __('message.contact') }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.update',[$contact->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">{{ __('label.name') }}</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')?old('name'):$contact->name }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('label.email') }}</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')?old('email'):$contact->email }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('label.address') }}</label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address')?old('address'):$contact->address }}">
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('label.content') }}</label>
                            <textarea type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content')?old('content'):$contact->content }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group text-center">
                            <a href="{{ route('home') }}" class="btn btn-danger">{{ __('label.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('label.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

