@extends('layouts')

@section('content')
    <h1> id name image location rating description </h1>
    <a href="{{ route('add') }}">ADD hotel</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">location</th>
                <th scope="col">rating</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        @foreach ($getlisthotel as $h)
            <tbody>
                <tr>
                    <td> {{ $h->id }} </td>
                    <td> {{ $h->name }} </td>
                    <td> <img src="{{ Storage::url('/images/') . $h->image }}" style="width: 100px"></td>
                    <td> {{ $h->location }} </td>
                    <td> {{ $h->rating }} </td>
                    <td> {{ $h->description }} </td>

                    <td>
                        <a href="{{ route('edit', ['hotel' => $h]) }}"> <button class="btn btn-primary">edit</button></a>

                        <form action="{{ route('delete', ['hotel' => $h]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Ban muon xoa chu')">xoa</button>
                        </form>

                    </td>

                </tr>

            </tbody>
        @endforeach


    </table>
@endsection
