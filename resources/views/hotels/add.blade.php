@extends('layouts')

@section('content')
    <h1>Them moi hotel</h1>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1> id name image location rating description </h1>
        <label for="">name</label>
        <input type="text" name="name" placeholder="name" class="form-control">
        <div>
            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">image</label>
        <input type="file" name="image" placeholder="image" class="form-control">
        <div>
            @error('image')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">location</label>
        <input type="text" name="location" placeholder="location" class="form-control">
        <div>
            @error('location')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">rating</label>
        <input type="text" name="rating" placeholder="rating" class="form-control">
        <div>
            @error('rating')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">description</label>
        <input type="text" name="description" placeholder="description" class="form-control">
        <div>
            @error('description')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <input type="submit" value="Add" class="btn btn-success m-2">

    </form>
@endsection
