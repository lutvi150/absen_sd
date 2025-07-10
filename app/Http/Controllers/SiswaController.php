<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\OrangtuaModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Siswa";
        $siswa = SiswaModel::all();
        return view('admin.data_siswa', compact("siswa", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Siswa";
        $kelas = KelasModel::all();
        return view('admin.tambah_siswa', compact("title", "kelas"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(SiswaModel $siswaModel, $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaModel $siswaModel)
    {
        $siswa = SiswaModel::find($siswaModel->id);
        if ($siswa) {
            return response()->json([
                'status' => true,
                'message' => 'Data siswa ditemukan.',
                'data' => $siswa,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan.',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiswaModel $siswaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaModel $siswaModel)
    {
        $siswa = SiswaModel::find($siswaModel->id);
        if ($siswa) {
            $orangTua = OrangtuaModel::where('id_siswa', $siswa->id)->first();
            if ($orangTua) {
                $orangTua->delete();
            }
            $siswa->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data siswa berhasil dihapus.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan.',
            ], 404);
        }
    }
}
