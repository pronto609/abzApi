@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ $formName }}</h2>
        <form method="POST"
              action="{{ route('users.store') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input
                    type="text"
                    name="first_name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    placeholder="Enter user name"
                    value="{{ old('name') ?? (isset($user) ? $user->name : '') }}"
                >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="Enter company email"
                    value="{{ old('email') ?? (isset($user) ? $user->email : '') }}"
                >
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    id="phone"
                    placeholder="Phone"
                    value="{{ old('phone') ?? (isset($user) ? $user->phone : '') }}"
                >
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <select
                    name="position_id"
                    class="form-control single-select @error('position') is-invalid @enderror"
                    id="company_id"
                    @selected(old('company_id') ?? (isset($employee) ? $employee->company_id : ''))
                >
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
                @error('position_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="logo">User Photo</label>
                <input
                    type="file"
                    name="photo"
                    class="form-control-file @error('photo') is-invalid @enderror"
                    id="logo"
                >
                @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
