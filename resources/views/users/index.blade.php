@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">E-mail</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

@endsection
