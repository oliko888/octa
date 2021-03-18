@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <ul class="list-group">
                <li class="list-group-item"><b>First name: </b>{{ $employee->first_name ? $employee->first_name : '-' }}</li>
                <li class="list-group-item"><b>Last name: </b>{{ $employee->last_name ? $employee->last_name : '-' }}</li>
                <li class="list-group-item"><b>Email: </b>{{ $employee->email ? $employee->email : '-' }}</li>
                <li class="list-group-item"><b>Phone: </b>{{ $employee->phone ? $employee->phone : '-' }}</li>
                <li class="list-group-item"><b>Company: </b>{{ isset($company[0]->name) ? $company[0]->name : '-' }}</li>
                <li class="list-group-item"><b>Updated: </b>{{ $employee->updated_at }}</li>
            </ul>

            <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-outline-primary float-right m-3">Back</button></a>

        </div>
    </div>
</div>
@endsection
