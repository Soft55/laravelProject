@extends('templates.template')

@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">
            {!! link_to_route('properties.create', 'Créer un article', [], ['class' => 'btn btn-info']) !!}
            {!! link_to_route('logout', 'Deconnexion', [], ['class' => 'btn btn-warning']) !!}
        </div>
    @else
        {!! link_to('login', 'Se connecter', ['class' => 'btn btn-info pull-right']) !!}
    @endif
@endsection

@section('contenu')
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    {!! $links !!}
    @foreach($properties as $properties)
        <article class="row bg-primary">
            <div class="col-md-12">
                <header>
                    <h1>{{ $properties->longitude }}</h1>
                </header>
                <hr>
                <section>
                    <p>{{ $properties->latitude }}</p>
                    @if(Auth::check())
                        {!! Form::open(['method' => 'DELETE', 'route' => ['properties.destroy', $properties->id]]) !!}
                        {!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                        {!! Form::close() !!}
                    @endif
                </section>
            </div>
        </article>
        <br>
    @endforeach
    {!! $links !!}
@endsection