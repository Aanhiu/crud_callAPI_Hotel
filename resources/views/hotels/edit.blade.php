@extends('layouts')

@section('content')
    <h1>Cap nhat hotel</h1>

    <form action="{{ route('update', ['hotel' => $hotel]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1> id name image location rating description </h1>
        <label for="">name</label>
        <input type="text" name="name" placeholder="name" class="form-control" value="{{ old('name') ?? $hotel->name }}">
        <div>
            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">image</label>
        <input type="file" name="image" placeholder="image" class="form-control"
            value="{{ old('image') ?? $hotel->image }}">
        <div>
            @error('image')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">location</label>
        <input type="text" name="location" placeholder="location" class="form-control"
            value="{{ old('location') ?? $hotel->location }}">
        <div>
            @error('location')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">rating</label>
        <input type="text" name="rating" placeholder="rating" class="form-control"
            value="{{ old('rating') ?? $hotel->rating }}">
        <div>
            @error('rating')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">description</label>
        <input type="text" name="description" placeholder="description" class="form-control"
            value="{{ old('description') ?? $hotel->description }}">
        <div>
            @error('description')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <input type="submit" value="cap nhat" class="btn btn-success m-2">

    </form>
@endsection
