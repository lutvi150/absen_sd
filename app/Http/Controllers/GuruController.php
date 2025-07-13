<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Guru";
        $guru = GuruModel::all();
        return view('admin.data_guru', compact("guru", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required|min:3',
            'nip' => 'required|unique:guru,nip',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $user = User::create([
            'email' => $request->email,
            'name' => $request->nama_guru,
            'role' => 'guru',
            'password' => bcrypt($request->nip), // Ensure you hash the password
        ]);
        $id_user = $user->id;
        $guru = GuruModel::create([
            'id_user' => $id_user,
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $request->foto ? $request->foto->store('guru', 'public') : null,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Data guru berhasil disimpan.',
            'data' => $guru,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GuruModel $guruModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuruModel $guruModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuruModel $guruModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuruModel $guruModel, $id)
    {
        $guru = GuruModel::find($id);
        if ($guru) {
            $guru->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data guru berhasil dihapus.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data guru tidak ditemukan.',
            ], 404);
        }
    }
    function getGuru()
    {
        $guru = GuruModel::select('id', 'nama_guru')->get();
        return response()->json([
            'status' => true,
            'data' => $guru,
            'message' => 'Data guru berhasil ditemukan.'
        ], 200);
    }
    // use for attendance
    function () : Returntype {
        
    }
}
