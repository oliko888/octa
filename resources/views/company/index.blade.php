@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('company.create') }}"><button type="button" class="btn btn-primary float-right m-2">Add new</button></a>

            @if ($companies->isEmpty())
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
                        @foreach ($companies as $c)
                            <tr>
                                <th scope="row">{{ $c->id }}</th>
                                <td><a href="{{ route('company.show', ['company' => $c->id]) }}">{{ $c->name }}</a></td>
                                <td>
                                    <span><a href="{{ route('company.edit', ['company' => $c->id]) }}"><button type="button" class="btn btn-outline-secondary btn-sm">Edit</button></a></span>     
                                        <form action="{{ route('company.destroy', ['company' => $c->id]) }}" method="POST" class="index">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination justify-content-center">
                    {{ $companies->links("pagination::bootstrap-4") }}
                </div>
            @endif

        </div>
    </div>
</div>


@endsection
