@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Telephone directory
                </div>
                <div class="card-body">
                    <table class="table border table-bodered table-hover text-center">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>phone</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Your Name: {{ Auth::user()->name }}</td>
                                <td>Your phone: {{ Auth::user()->phone }}</td>
                            </tr>
                            @if($users->count()<=0)
                                <tr>
                                    <td colspan="2">
                                        <div class="alert alert-danger" role="alert">
                                            Empty Data
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
