@extends('layouts.app')


@section('content')
<div class="m-auto w-2/5 justify-center justify-items-center content-center items-center">
    <div>
        <h1 class="text-xl">Todo List</h1>
        <div>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker my-1" v-model="newTodo" placeholder="Add Todo">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700 cursor-pointer my-1">Add</a>
            @endif
            @endguest
        </div>
    </div>
</div>
@endsection