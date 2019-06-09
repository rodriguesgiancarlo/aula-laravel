<?php

namespace App\Http\Controllers;

use App\Cervejaria;
use Illuminate\Http\Request;

class CervejariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cervejarias = Cervejaria::orderBy('nome')->get();
        return view('cervejarias.index', compact(['cervejarias']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cervejaria = new Cervejaria();
        return view('cervejarias.create', compact(['cervejaria']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $c = new Cervejaria();
            $c->nome = $request->nome;
            $c->cnpj = $request->cnpj;
            $c->saveOrFail();

            session()->flash('success-message', 'Cervejaria inserida com sucesso!');
            return redirect()->route('cervejarias.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível criar a nova cervejaria.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cervejaria  $cervejaria
     * @return \Illuminate\Http\Response
     */
    public function show($cervejaria_id)
    {
        try {
            $cervejaria = Cervejaria::findOrFail($cervejaria_id);
            return view('cervejarias.show', compact(['cervejaria']));

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível localizar a cervejaria solicitada.');
            return redirect()->route('cervejarias.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cervejaria  $cervejaria
     * @return \Illuminate\Http\Response
     */
    public function edit($cervejaria_id)
    {
        try {
            $cervejaria = Cervejaria::findOrFail($cervejaria_id);
            return view('cervejarias.edit', compact(['cervejaria']));

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível localizar a cervejaria solicitada.');
            return redirect()->route('cervejarias.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cervejaria_id)
    {
        try {
            $cervejaria = Cervejaria::findOrFail($cervejaria_id);
            $cervejaria->nome = $request->nome;
            $cervejaria->cnpj = $request->cnpj;
            $cervejaria->save();

            session()->flash('success-message', 'Dados da cervejaria alterados com sucesso!');
            return redirect()->route('cervejarias.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível alterar os dados da cervejaria.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cervejaria  $cervejaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($cervejaria_id)
    {
        try {
            $cervejaria = Cervejaria::findOrFail($cervejaria_id);
            $cervejaria->delete();

            session()->flash('success-message', 'Cervejaria removida com sucesso!');
            return redirect()->route('cervejarias.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível remover a cervejaria.');
            return redirect()->route('cervejarias.index');
        }
    }
}
