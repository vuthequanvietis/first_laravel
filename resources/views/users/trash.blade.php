@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success will-hid" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Your trash
                </div>
                <div class="card-body">
                    <table class="table border table-bodered table-hover text-center">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>email</td>
                                <td>content</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if($contacts->count() <=0)
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger" role="alert">
                                            Empty Data
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->content }}</td>
                                        <td style="width: 5%">
                                            <form id="remove_form" action="{{ route('contacts.hard.destroy',[$contact->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-remove btn-sm btn-danger" type="submit">remove</button>
                                            </form>
                                            <a class="btn btn-remove btn-sm btn-primary" href="{{ route('contacts.restore', [$contact->id]) }}">Restore</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
