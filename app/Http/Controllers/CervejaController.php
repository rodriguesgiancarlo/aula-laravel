<?php

namespace App\Http\Controllers;

use App\Cerveja; 
use App\Cervejaria; 
use App\Ingrediente; 
use App\Http\Requests\CervejaRequest;
use Illuminate\Http\Request;

class CervejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cervejas = Cerveja::orderBy('nome')->get();
        return view('cervejas.index', compact(['cervejas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cerveja = new Cerveja();
        $cervejarias = Cervejaria::orderBy('nome')->get();
        $ingredientes = Ingrediente::orderBy('nome')->get();
        return view('cervejas.create', compact(['cerveja', 'cervejarias', 'ingredientes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CervejaRequest $request)
    {
        try {
            $c = new Cerveja();
            $c->nome = $request->nome;
            $c->cervejaria_id = $request->cervejaria_id;
            $c->saveOrFail();

            $c->ingredientes()->sync($request->ingredientes);

            session()->flash('success-message', 'Cerveja inserida com sucesso!');
            return redirect()->route('cervejas.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível inserir a cerveja.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $cerveja = Cerveja::findOrFail($id);
            $cervejarias = Cervejaria::orderBy('nome')->get();
            $ingredientes = Ingrediente::orderBy('nome')->get();
            return view('cervejas.edit', compact(['cervejarias', 'cerveja', 'ingredientes']));

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível localizar a cerveja solicitada.');
            return redirect()->route('cervejas.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CervejaRequest $request, $id)
    {
        try {
            $cerveja = Cerveja::findOrFail($id);
            $cerveja->nome = $request->nome;
            $cerveja->cervejaria_id = $request->cervejaria_id;
            $cerveja->save();

            $cerveja->ingredientes()->sync($request->ingredientes);

            session()->flash('success-message', 'Dados da cerveja alterados com sucesso!');
            return redirect()->route('cervejas.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível alterar os dados da cerveja.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cerveja = Cerveja::findOrFail($id);
            $cerveja->delete();

            session()->flash('success-message', 'Cerveja removida com sucesso!');
            return redirect()->route('cervejas.index');

        } catch(\Exception $e) {
            session()->flash('error-message', 'Não foi possível remover a cerveja.');
            return redirect()->route('cervejas.index');
        }
    }
}
