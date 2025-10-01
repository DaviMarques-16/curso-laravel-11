@extends('admin.layouts.app')

@section('title', 'Editar o Usuário')

@section('content')
    <h1>Editar o Usuário: {{ $user->name }}</h1>
    <x-alert />

     <form action="{{ route('users.update', $user->id) }}" method="POST">
        <!-- <input type="text" name="_token" value="{{ csrf_token() }}"> -->
        @method('put')  <!-- atualizações de usuários -->
        @include('admin.users.partials.form')
    </form>

@endsection