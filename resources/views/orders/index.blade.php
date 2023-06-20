@extends('layouts.main')
@section('relleno')


@if (Auth::check()  && Auth::user()->rol == 'user')
  



@endif

@if (Auth::check()  && Auth::user()->rol == 'employee')
    <p>soy empleado</p>
@endif

<p>oreder</p>
@endsection