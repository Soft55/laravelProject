@extends('layouts.app')

@section('propert')
    <a href="http://localhost/_github/laravelProject/public/properties/{{ $properties }}/edit">Update properties</a>
@endsection

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Update properties</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::model($properties, ['route' => ['properties.update', $properties->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('longitude') ? 'has-error' : '' !!}">
                        {!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => 'Longitude']) !!}
                        {!! $errors->first('longitude', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('latitude') ? 'has-error' : '' !!}">
                        {!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => 'Latitude']) !!}
                        {!! $errors->first('latitude', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection