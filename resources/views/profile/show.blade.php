@extends('layouts.app')
@extends('partials.header')

 @section('content')

@auth
<h1>Welcome {{Auth::user()->name}}</h1>
<h1>Description{{Auth::user()->description}}</h1>
@endauth



@endsection


