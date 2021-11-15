@extends('layouts.layout')

@section('title')
    {{$chapter->title}}
@endsection

@section('content')
    <div class="container">
        <h2>{{$chapter->title}} <a href="<?= $previous ?>" ><button type="button" class="btn btn-primary">Retour</button></a></h2>
        <div class="row">
            <div class="col-sm-12">
                <h5>{{$chapter->title}}</h5>
                <p style="overflow-wrap: break-word;">{{$chapter->content}}</p>
            </div>
        </div>
    </div>
@endsection