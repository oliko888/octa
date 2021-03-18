@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <ul class="list-group">
                <li class="list-group-item"><b>Name: </b>{{ $company->name ? $company->name : '-' }}</li>
                <li class="list-group-item"><b>Email: </b>{{ $company->email ? $company->email : '-' }}</li>
                <li class="list-group-item"><b>Website: </b>{{ $company->website ? $company->website : '-' }}</li>
                @if (!empty($company->logo))
                    <b>Logo:</b>
                   <img class="logo" src="{{ asset('storage/'. $company->logo) }}" alt="Logo">
                @else
                    <li class="list-group-item"><b>Logo: </b>-</li>
                @endif
                <li class="list-group-item"><b>Updated: </b>{{ $company->updated_at }}</li>
            </ul>

              <a href="{{ route('company.index') }}"><button type="button" class="btn btn-outline-primary float-right m-2">Back</button></a>

        </div>
    </div>
</div>
@endsection
