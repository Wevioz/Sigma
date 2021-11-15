@extends('layouts.layout')

@section('title')
Chapter
@endsection

@section('content')
<div class="container">
    <h2>Editer un chapitre</h2>
    <div class="row">
        <div class="col-sm-12">
            <?php $chformations = [];
                foreach($chapter->formations as $formation) array_push($chformations, $formation->id);
             ?>
            <form method="POST" action="<?php Request::path() ?>">
                @csrf
                <label for="formations">Associer aux formations :</label>
                <select class="form-select" multiple aria-label="multiple select example" id="formations" name="formations[]">
                    @foreach ($formations as $formation)
                        <option value="{{$formation->id}}" <?php if(in_array($formation->id, $chformations)) echo "selected" ?>>({{$formation->id}}){{$formation->title}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$chapter->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Contenu:</label>
                    <br>
                    <textarea id="content" name="content">{{$chapter->content}}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-warning">Editer un chapitre</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
