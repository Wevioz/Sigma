@extends('layouts.layout')

@section('title')
    {{$formation->title}}
@endsection

@section('content')
    <div class="container">
        <h2>{{$formation->title}} @if (Auth::check()) <a href="/chapters/add" ><button type="button" class="btn btn-primary">Nouveau</button></a> @endif</h2>
        <div class="row">
            @if (count($formation->chapters) == 0)
                <p> Pas de chapitre pour cette formation pour le moment </p>
            @endif
            @foreach ($formation->chapters as $chapter)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$chapter->title}}</h5>
                            <p class="card-text">fait par {{$chapter->user->name}}</p>
                            <a href="/chapters/{{$chapter->id}}" class="btn btn-primary">Découvrir le chapitre</a>
                            @if(Auth::check() and (Auth::user()->isAdmin == 1 or Auth::id() == $chapter->user->id))
                            <a href="/chapters/{{$chapter->id}}/edit" class="btn btn-warning">Éditer</a>
                            <a href="/chapters/{{$chapter->id}}/delete" class="btn btn-danger">Supprimer</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection