@extends('layouts.layout')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container">
        <h2>Categories @if (Auth::check()) <a href="categories/add" ><button type="button" class="btn btn-primary">Nouveau</button></a> @endif</h2>
        <div class="row">
            
            @foreach ($categories as $category)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->title}}</h5>
                            <p class="card-text">{{$category->description}} fait par {{$category->user->name}}</p>
                            <a href="categories/{{$category->id}}" class="btn btn-primary">Découvrir</a>
                            @if(Auth::check() and (Auth::user()->isAdmin == 1 or Auth::id() == $category->user->id))
                            <a href="categories/{{$category->id}}/edit" class="btn btn-warning">Éditer</a>
                            <a href="categories/{{$category->id}}/delete" class="btn btn-danger">Supprimer</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection