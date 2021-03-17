@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" enctype="multipart/form-data" action="{{ route('company.store') }}">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Email address:</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label>Website:</label>
                    <input name="website" type="text" class="form-control" placeholder="Enter website" value="{{ old('website') }}">
                </div>


                <label>Upload Logo:</label>
                <div class="form-group">
                    <input type="file" name="logoUpload">
                    @error('logoUpload') <p class="error">{{ $message }}</p> @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

                @csrf
            </form>

            <a href="{{ route('company.index') }}"><button type="button" class="btn btn-outline-primary float-right m-2">Back</button></a>

        </div>
    </div>
</div>
@endsection
