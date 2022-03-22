@extends('template')

@section('container')
    <h1>Category : {{ $category }}</h1>
    <hr/>
    @foreach($articles as $article)
        <article class="mb-5 border-bottom pb-3">
            <h3>
                <a href="/myblog/{{ $article->slug }}" class="text-decoration-none">
                {{ $article->title }}
                </a>                    
            </h3>
            <h6>By: <a href="/authors/{{ $article->author->username }}" class="text-decoration-none"> {{ $article->author->name }} </a></h6>
            <p>{{ $article->excerpt }}</p>
        </article>
    @endforeach
@endsection