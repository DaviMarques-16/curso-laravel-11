@extends('admin.layouts.app') <!-- Herdando o Layout -->

@section('title', 'Listagem dos usuários')

@section('content') <!-- Conteúdo dinâmico -->

 <h1>Usuários</h1>

    <a href="{{ route('users.create') }}">Adicionar novo usuário</a>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <!-- diretivas -->
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan='100'>Nenhum usuário no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
@endsection