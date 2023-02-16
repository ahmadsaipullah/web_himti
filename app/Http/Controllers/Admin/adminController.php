<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::with('level')->simplePaginate(5);
        return view('dashboard.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth()->user()->id_level == 1) {
            $levels = level::all();
            return view('dashboard.admin.create', compact('levels'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string'],
            'password' => ['required', 'min:6'],
            'id_level' => '',
            'image' => '',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'id_level' => $request->id_level,
            'image' => $request->image,
        ];

        $data['image'] = $request->file('image')->store('asset/admin', 'public');

        User::create($data);

        alert()->success('Success', 'Selamat Anda Berhasil Menambah Admin');
        return to_route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        $levels = level::all();
        $admin = User::with('level')->findOrFail($admin);
        return view('dashboard.admin.edit', compact('levels', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $dataId = $admin->find($admin->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/admin', 'public');
        }

        $dataId->update($data);

        alert()->success('Success', 'Selamat Anda Berhasil Mengupdate Admin');
        return to_route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        Storage::delete('public/' . $admin->image);
        $admin->delete();
        alert()->success("{$admin['name']}", 'Berhasil Di Hapus');
        return back();
    }
}
