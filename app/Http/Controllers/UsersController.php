<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $repository;

    public function __construct(User $users)
    {
        $this->middleware('auth');

        $this->repository = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->get();

        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $columns = $request->all();

        $columns['password'] = bcrypt($columns['password']);

        $users = $this->repository->create($columns);

        return redirect()
            ->route('users.index')
            ->with('message', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Users  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {

        $user = $this->repository->where('uuid', $uuid)->first();

        if (!$user) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Registro não encontrado!');
        }

        return view('pages.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($users)
    {
        return view('pages.users.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $uuid)
    {
        if (!$user = $this->repository->find($uuid)) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Registro não encontrado!');
        }

        $columns = $request->only(['name', 'email']);

        if ($request->password) {
            $columns['password'] = bcrypt($request->password);
        }

        $user->update($columns);

        return redirect()
            ->back()
            ->with('message', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = $this->repository
            ->where('id', $id)
            ->first();

        if (!$employee) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Registro não encontrado!');
        }

        $employee->delete();

        return redirect()
            ->route('users.index')
            ->with('message', 'Deletado com sucesso!');
    }
}
