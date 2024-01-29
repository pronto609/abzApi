@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="col-4">
            @include('app.user.edit')
        </div>
        <div class="col-8">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">Create employee</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('employees.show', ['user'=>$user->id]) }}"
                                       class="btn btn-success">Show</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
@endsection
