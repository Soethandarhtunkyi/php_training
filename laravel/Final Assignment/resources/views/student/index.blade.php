@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($students) > 0)
    <div class="card text-center">
        <div class="card-header">
            Students Informations
            <div class="card-body">
                <form action="{{ route('students.index') }}" method="GET">
                    <div class="input-group my-5">
                        <input type="text" class="form-control mr-4" placeholder="Name" name="name">
                     <input placeholder="Start Date" name="start_date" class="textbox-n form-control mr-4" type="text" onfocus="(this.type='date')"/>
                        <input placeholder="End Date" name="end_date" class="textbox-n form-control mr-4" type="text" onfocus="(this.type='date')"/>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex my-2">
            <a href="{{ route('students.upload') }}" class="btn btn-success">Import Data</a>
            <a href="{{ route('students.download') }}" class="btn btn-primary ml-4">Export Data</a>
            <a href="{{ route('showEmailForm') }}" class="btn btn-info ml-4">Send Email</a>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('errors'))
        <div class="alert alert-danger">
            {{ session()->get('errors') }}
        </div>
        @endif
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ \Carbon\Carbon::parse ($student->created_at)->toDateString();}}
                        <td>
                            <a href="{{ route('students.edit', [$student->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('students.destroy', [$student->id]) }}" onclick="return confirm('Are you sure?')" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <p class="text-secondary text-center p-3 mb-2 bg-info">No student found</p>
    @endif
</div>
@endsection