@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <ul class="list-group">
                @if (!empty($company->name))
                    <li class="list-group-item"><b>Name: </b>{{ $company->name }}</li>
                @endif
                @if (!empty($company->email))
                    <li class="list-group-item"><b>Email: </b>{{ $company->email }}</li>
                @endif
                @if (!empty($company->website))
                    <li class="list-group-item"><b>Website: </b>{{ $company->website }}</li>
                @endif
                @if (!empty($company->logo))
                <b>Logo:</b>
                   <img class="logo" src="{{ asset('storage/'. $company->logo) }}" alt="Logo">
                @endif
                @if (!empty($company->updated_at))
                    <li class="list-group-item"><b>Updated: </b>{{ $company->updated_at }}</li>
                @endif
            </ul>

              <a href="{{ route('company.index') }}"><button type="button" class="btn btn-outline-primary float-right m-2">Back</button></a>

        </div>
    </div>
</div>
@endsection
