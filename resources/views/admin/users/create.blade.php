@extends('admin.layouts.app')
@section('title', 'Criar usuários')
@section('content')
    <h1> Novo Usuário </h1>

    <form action="{{ route('users.store') }}" method="POST">
        <!-- <input type="text" name="_token" value="{{ csrf_token() }}"> -->
        @include('admin.users.partials.form')
    </form>

@endsection