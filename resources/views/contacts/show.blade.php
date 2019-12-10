@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success will-hid" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <div class="name card-title">
                        <h2>{{ $contact->name }}</h2>
                    </div>
                    <div class="email">
                        <small>{{ $contact->email }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content">
                        <p>{{ $contact->content }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="gotoback">
                        <a class="btn btn-primary" href="{{ route('home') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
