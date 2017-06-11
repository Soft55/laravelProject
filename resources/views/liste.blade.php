@extends('layouts.app')

@section('propert')
    @foreach($properties as $property)
        @if($property->user_id == Auth::id())
            <a href="http://localhost/_github/laravelProject/public/properties/{{ $property->id }}/edit">Update properties</a>
        @endif
    @endforeach
@endsection

@section('content')
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    {!! $links !!}
    @foreach($properties as $property)
        @if($property->user_id == Auth::id())
            <div class="container">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default col-xs-12">
                            <div class="panel-heading col-xs-6">Your longitude</div>

                            <div class="panel-heading col-xs-6">Your latitude</div>

                            <div class="panel-body col-xs-6">
                                {{ $property->longitude }}
                            </div>
                            <div class="panel-body col-xs-6">
                                {{ $property->latitude }}
                            </div>
                        </div>
                    </div>
                    <div id="map" style="height:500px; width:100%;">
                        <script>
                            function initMap() {
                                var uluru = {lat: {{ $property->latitude }}, lng: {{ $property->longitude }}};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 4,
                                    center: uluru
                                });
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }
                        </script>
                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzyqPuh8GZo4Ln3orDXcnpyPyiVf5FOlY&callback=initMap">
                        </script>
                    </div>
                </div>
            </div>
            <br>
        @endif
    @endforeach
    {!! $links !!}
@endsection