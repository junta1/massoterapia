@extends('layout.app')

@section('content')


{{date_default_timezone_set('America/Sao_Paulo')}} Data
{{date("d/m/Y H:i:s")}}



@endsection