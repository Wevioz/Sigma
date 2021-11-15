@extends('layouts.layout')

@section('title')
Admin
@endsection

@section('content')
<div class="container">
    <h2>Validation des comptes</h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="/admin/{{$user->id}}"><button class="btn btn-success">Valider le compte</button></a></td>
                    </tr>
                    @endforeach
                    @if (count($users) == 0)
                        <td colspan="3"> Pas d'utilisateurs à valider pour le moment </p>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


