@extends('layouts.layout')

@section('title')
Formation
@endsection

@section('content')
<div class="container">
    <h2>Ajouter une formation</h2>
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="<?php Request::path() ?>" enctype="multipart/form-data">
                @csrf
                <label for="categories">Associer aux catégories :</label>
                <select class="form-select" multiple aria-label="multiple select example" id="categories" name="categories[]">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">({{$category->id}}){{$category->title}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="thumbnail">Image :</label>
                    <input type="file" name="image" class="form-control" id="thumbnail" name="thumbnail" required accept="image/*">
                </div>
                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="duration">Duration :</label>
                    <input type="text" class="form-control" id="duration" name="duration">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter une formation</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
