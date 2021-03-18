@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="text-center">
                <h5>Employees</h5>
                <hr>
            </div>

            <a href="{{ route('employee.create') }}"><button type="button" class="btn btn-primary float-right m-2">Add new</button></a>

            @if ($employees->isEmpty())
                <h5>No entries...</h5>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $e)
                            <tr>
                                <th scope="row">{{ $e->id }}</th>
                                <td><a href="{{ route('employee.show', ['employee' => $e->id]) }}">{{ $e->first_name. ' '. $e->last_name }}</a></td>
                                <td>
                                    <a href="{{ route('employee.edit', ['employee' => $e->id]) }}"><button type="button" class="btn btn-outline-secondary btn-sm">Edit</button></a>   
                                    <form action="{{ route('employee.destroy', ['employee' => $e->id]) }}" method="POST" class="index">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete {{ $e->first_name. ' '. $e->last_name }}?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination justify-content-center">
                    {{ $employees->links("pagination::bootstrap-4") }}
                </div>
            @endif

        </div>
    </div>
</div>


@endsection
