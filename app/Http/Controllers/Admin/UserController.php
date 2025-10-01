<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function index() {

        
        /* $user = User::first();
        return view('admin.users.index', compact('user'));
        */
        //caminho da view
        //compact passa a variavel user para a view

        //$users = User::all();
        $users = User::paginate(15);
        //dd para debugar, mostra o conteudo da variavel e para a execucao
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function create() { //action para criar usuario
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) {

        //dd($request->only('_token'));
        //dd($request->except('_token'));
        //dd($request->all());
        
        //Passa o array montado pelo all para o create
        User::create($request -> validated());

        return redirect()
        ->route('users.index')
        ->with('success', 'Usuário criado com sucessso!');


    }

    public function edit(string $id) {
        //$user  = User::where('id', '=', $id)->first()
        //$user  = User::where('id', $id)->first()
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id) {
        if (!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
        ->route('users.index')
        ->with('success', 'Usuário editado com sucesso!');
    }

    public function show(string $id) {
        // if(Gate::denies('is-admin')) {
        //     return back()->with('message', 'Você não é um administrador');
        // }

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id) {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
    }

        //user não era pra poder se deletar
        // if (Auth::user()?->id === $user->id) {
        //     return back()->with('message', 'Você não pode deletar own user');
        // }

        $user->delete();

        return redirect()
        ->route('users.index')
        ->with('success', 'Usuário DELETADO com sucessso!');

    }

}
