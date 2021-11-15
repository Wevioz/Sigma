@extends('layouts.layout')

@section('title')
Mon compte
@endsection

@section('content')
<div class="container">
    <h2>Mon compte</h2>
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="/account">
                @csrf
                <label for="grade">Grade : <?php if($user->isAdmin) echo "Admin"; else echo "Formateur"; ?></label>
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Adresse email :</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Editer profil</button>

                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
                
                <br>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
