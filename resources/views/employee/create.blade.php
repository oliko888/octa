@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" enctype="multipart/form-data" action="{{ route('employee.store') }}">
                <div class="form-group">
                    <label>First name:</label>
                    <input name="firstName" type="text" class="form-control" placeholder="Enter first name" value="{{ old('firstName') }}">
                    @error('firstName') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Last name:</label>
                    <input name="lastName" type="text" class="form-control" placeholder="Enter last name" value="{{ old('lastName') }}">
                    @error('lastName') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Email address:</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Phone:</label>
                    <input name="phone" type="text" class="form-control" placeholder="Enter phone" value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                    <label>Company:</label>
                    <select name="companyId" class="form-control">
                        <option value="">Select company</option>
                        @if ($companies->isNotEmpty())
                            @foreach ($companies as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

                @csrf
            </form>

            <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-outline-primary float-right m-2">Back</button></a>

        </div>
    </div>
</div>
@endsection
