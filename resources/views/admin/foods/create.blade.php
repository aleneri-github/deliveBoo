@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="body">Testo</label>
                <textarea class="form-control" id="body" name="body" rows="10" value="{{ old('body') }}"></textarea>
            </div>

            <div class="form-group">
                <label for="img_path">Testo</label>
                <input class="form-control" type="file" name="img_path" id="img_path" accept="image/*">
            </div>

            <input class="btn btn-primary" type="submit" value="Crea">
        </form>
    </div>
@endsection