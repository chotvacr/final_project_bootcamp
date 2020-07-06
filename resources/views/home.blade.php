@extends('layouts.app')
@extends('partials.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Personal Profile for: ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ auth()->user()->name }} {{ auth()->user()->surname }}
                </div>

                <form method="post" action="/">
                    @csrf

                    <div>
                        <label>Description</label>
                        <input type="text" name="description" value="{{ auth()->user()->description }}">
                    </div>
    
                    <button type="submit">save description</button>
    
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
