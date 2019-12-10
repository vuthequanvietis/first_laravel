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
                    <span>{{ __('index.dashboard') }}</span>
                    <div>
                        <a href="{{ route('contacts.create') }}" class=" btn btn-sm btn-outline-primary">{{ __('index.newcontact') }}</a>
                        <a href="{{ route('users.index') }}" class=" btn btn-sm btn-outline-primary">{{ __('index.users') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table border table-bodered table-hover text-center">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>email</td>
                                <td>content</td>
                                <td colspan="2" style="width: 10%">action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contacts->count() <= 0)
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger" role="alert">
                                            Empty Data
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->content }}</td>
                                    <td style="width: 5%">
                                        <form id="soft-delete" action="{{ route('contacts.destroy',[$contact->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Move to Recycle Bin" class="btn btn-remove btn-sm btn-danger" type="submit"><i class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td style="width: 5%">
                                        <a class="btn btn-sm btn-success" href="{{ route('contacts.edit',[$contact->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
