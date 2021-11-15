@extends('layouts.layout')

@section('title')
    {{$category->title}}
@endsection

@section('content')
    <div class="container">
        <h2>Liste des formations de la catégorie {{$category->title}} @if (Auth::check()) <a href="/formations/add" ><button type="button" class="btn btn-primary">Nouveau</button></a> @endif</h2>
        <div class="row">

            @if (count($category->formations) == 0)
                <p> Pas de formations pour cette catégorie pour le moment </p>
            @endif
            
            @foreach ($category->formations as $formation)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img class="card-img-top" src="/images/{{$formation->thumbnail}}" alt="Card image cap">
                            <h5 class="card-title">{{$formation->title}}</h5>
                            <p class="card-text">{{$formation->description}} fait par {{$formation->user->name}}</p>
                            <a href="/formations/{{$formation->id}}" class="btn btn-primary">Découvrir la formation</a>
                            @if(Auth::check() and (Auth::user()->isAdmin == 1 or Auth::id() == $formation->user->id))
                            <a href="/formations/{{$formation->id}}/edit" class="btn btn-warning">Éditer</a>
                            <a href="/formations/{{$formation->id}}/delete" class="btn btn-danger">Supprimer</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection