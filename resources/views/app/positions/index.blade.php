@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Position</th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $position->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $positions->links() !!}
    </div>
@endsection
