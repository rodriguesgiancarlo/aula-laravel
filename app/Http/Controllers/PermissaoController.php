<?php

namespace App\Http\Controllers;

use App\User;
use App\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('permissoes.index', compact(['users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $permissoes = Permissao::orderBy('slug')->get();
            
            return view('permissoes.edit', compact(['user', 'permissoes']));

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível localizar o usuário. Tente novamente.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->permissoes()->sync($request->permissoes);

            session()->flash('success-message', 'Permissões do usuário alteradas com sucesso!');
            return redirect()->route('permissoes.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível alterar as permissões do usuário. Tente novamente.');
            return redirect()->back()->withInput();
        }
    }

}
