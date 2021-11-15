@extends('layouts.layout')

@section('title')
Chapter
@endsection

@section('content')
<div class="container">
    <h2>Ajouter un chapitre</h2>
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="<?php Request::path() ?>">
                @csrf
                <label for="formations">Associer aux formations :</label>
                <select class="form-select" multiple aria-label="multiple select example" id="formations" name="formations[]">
                    @foreach ($formations as $formation)
                        <option value="{{$formation->id}}">({{$formation->id}}){{$formation->title}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Contenu:</label>
                    <br>
                    <textarea id="content" name="content"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter un chapitre</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
