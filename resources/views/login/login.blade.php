@extends('layouts.layout')

@section('title')
Connexion
@endsection

@section('content')
<div class="container">
    <h2>Connexion</h2>
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <label for="email">Adresse email :</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Connexion</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
                
                <br>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
