@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@vite('resources/css/app.css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <todo-component></todo-component>
</div>
@endsection
