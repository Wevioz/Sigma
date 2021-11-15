@extends('layouts.layout')

@section('title')
Categorie
@endsection

@section('content')
<div class="container">
    <h2>Editer une catégorie</h2>
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="<?php Request::path() ?>">
                @csrf
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $category->title ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= $category->description ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-warning">Editer</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
