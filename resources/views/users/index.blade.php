@extends('layouts.app')
@section('content')

<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-6">
            <h2>{{ __('shop_lang.user.index_title') }}</h2>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">E-mail</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Phone</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                    X
                </button>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{ $users->links() }}
</div>

@endsection

@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
    const confirm_delete_title = "{{ __('shop_lang.messages.confirm_delete_title') }}";
    const confirm_delete_text = "{{ __('shop_lang.messages.confirm_delete_text') }}";
    const confirm_button_text = "{{ __('shop_lang.messages.confirm_button_text') }}";
    const cancel_button_text = "{{ __('shop_lang.messages.cancel_button_text') }}";
    const fail_text = "{{ __('shop_lang.messages.fail_text') }}";
    const cancel_title = "{{ __('shop_lang.messages.cancel_title') }}";
    const cancel_text = "{{ __('shop_lang.messages.cancel_text') }}";
@endsection
@section('javascript-files')
    @vite(['resources/js/delete.js'])
@endsection
