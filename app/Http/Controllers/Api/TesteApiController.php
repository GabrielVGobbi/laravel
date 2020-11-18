<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\teste;
use App\Models\User;
use Illuminate\Http\Request;

class TesteApiController extends Controller
{
    protected $repository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = User::get()->toJson(JSON_PRETTY_PRINT);

        return response($teste, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.painel.rh.teste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $columns = $request->all();

        $teste = $this->repository->create($columns);

        return redirect()
            ->route('teste')
            ->with('message', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teste  $id
     * @return \Illuminate\Http\Response
     */
    public function show(teste $id)
    {
        $teste = $this->repository->where('id', $id)->first();

        if (!$teste) {
            return redirect()
                ->route('testes')
                ->with('message', 'Registro não encontrado!');
        }

        return view('pages.painel.rh.testes.show', [
            'teste' => $teste,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teste  $teste
     * @return \Illuminate\Http\Response
     */
    public function edit(teste $teste)
    {
        return view('pages.painel.rh.teste.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teste  $teste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teste $id)
    {
        $columns = $request->all();

        $teste = $this->repository->where('id', $id)->first();

        if (!$teste) {
            return redirect()
                ->route('testes')
                ->with('message', 'Registro não encontrado!');
        }

        $teste->update($columns);

        return redirect()
            ->back()
            ->with('message', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teste  $teste
     * @return \Illuminate\Http\Response
     */
    public function destroy(teste $id)
    {
        $employee = $this->repository
            ->where('id', $id)
            ->first();

        if (!$employee) {
            return redirect()
                ->route('testes')
                ->with('message', 'Registro não encontrado!');
        }

        $employee->delete();

        return redirect()
            ->route('testes')
            ->with('message', 'Deletado com sucesso!');
    }
}
