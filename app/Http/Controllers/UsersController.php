<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $user = User::where('username', $name)->first();
        $productos = $user->productos()->latest()->paginate(6);


        return view('users.productoUser', [
            'productos' => $productos,
            'user' => $user
        ]);
    }

    public function profile()
    {
        $user = Auth::user();

        return view('users.profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();
        $user = Auth::user();

        if (strpos($path, 'account')) {
            $data = array_filter($request->all());
            $user = User::findOrFail($user->id);
            $user->fill($data);
        } elseif (strpos($path, 'password')) {
            if (!Hash::check($request->get('current_password'), $user->password)) {
                return redirect()->back()->with('error', 'La constraseña no es la que tienes ahora');
            }
            if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
                return redirect()->back()->with('error', 'La contraseña tiene que ser diferente a la anterior.');
            }
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect()
            ->route('profile.account')
            ->with('exito', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home');
    }


    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dataLogin(Request $request)
    {
        $ip = $request->ip();
        $agent = ($request->server->getHeaders())['USER_AGENT'];
        DB::table('data_session')->insert([
            'user_id' => $this->user->id,
            'ip' => $ip,
            'explore' => $agent
        ]);
        return redirect('/home');
    }

    public function conf()
    {
        return view('users.edit');
    }


}
