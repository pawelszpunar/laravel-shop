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

{{--@section('script')--}}
{{--    <script type="text/javascript">--}}
{{--        console.log($('button'));--}}
{{--        console.log('AAA');--}}
{{--    </script>--}}
{{--@endsection--}}


@section('javascript')
    $(function() {
        $('.delete').click(function() {
            $.ajax({
                method: "DELETE",
                url: "http://127.0.0.1:8000/users/" + $(this).data("id"),
                //data: { id: $(this).data("id") }
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                window.location.reload();
            })
            .fail(function( msg ) {
                alert("ERROR");
            });
        });
    });
@endsection
