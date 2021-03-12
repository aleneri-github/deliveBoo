@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tutti i post</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Data creazione</th>
                    <th style="width: 150px">Immagine</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->format('d-m-y')}}</td>
                        <td>
                            <img class="img-fluid" src="{{ asset('storage/'. $post->img_path) }}" alt="{{$post->title}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection