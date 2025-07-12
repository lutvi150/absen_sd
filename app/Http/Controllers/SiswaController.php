<?php
namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\OrangtuaModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_siswa'             => 'required|string|max:100',
            'jenis_kelamin'          => 'required|in:L,P', // sesuaikan value radio
            'nis_siswa'              => 'required|numeric|unique:siswa,nisn',
            'alamat_siswa'           => 'required|string|max:255',
            'id_kelas'               => 'required|exists:kelas,id',

            'nama_orang_tua_lk'      => 'required|string|max:100',
            'pekerjaan_orang_tua_lk' => 'required|string|max:100',
            'alamat_orang_tua_lk'    => 'required|string|max:255',
            'no_telp_orang_tua_lk'   => 'required|digits_between:10,15',

            'nama_orang_tua_pr'      => 'required|string|max:100',
            'pekerjaan_orang_tua_pr' => 'required|string|max:100',
            'alamat_orang_tua_pr'    => 'required|string|max:255',
            'no_telp_orang_tua_pr'   => 'required|digits_between:10,15',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validasi gagal.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // Simpan data (contoh)
        $siswa = SiswaModel::create([
            'id_kelas'       => $request->id_kelas,
            'nama_siswa'     => $request->nama_siswa,
            'nis'           => $request->nis_siswa,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'foto'           => $request->foto ?? null, // handle foto upload if needed
            'alamat'         => $request->alamat_siswa,
        ]);
$idSiswa = $siswa->id;
$orangTuaLk = OrangtuaModel::create([
            'id_siswa'   => $idSiswa,
            'nama'       => $request->nama_orang_tua_lk,
            'jenis'      => 'Laki-laki',
            'pekerjaan'  => $request->pekerjaan_orang_tua_lk,
            'alamat'     => $request->alamat_orang_tua_lk,
            'no_hp'      => $request->no_telp_orang_tua_lk,
        ]);
$orangTuaPr = OrangtuaModel::create([   
            'id_siswa'   => $idSiswa,
            'nama'       => $request->nama_orang_tua_pr,
            'jenis'      => 'Perempuan',
            'pekerjaan'  => $request->pekerjaan_orang_tua_pr,
            'alamat'     => $request->alamat_orang_tua_pr,
            'no_hp'      => $request->no_telp_orang_tua_pr,
        ]);
        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil disimpan.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SiswaModel $siswaModel, $id)
    {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaModel $siswaModel)
    {
        $siswa = SiswaModel::find($siswaModel->id);
        if ($siswa) {
            return response()->json([
                'status'  => true,
                'message' => 'Data siswa ditemukan.',
                'data'    => $siswa,
            ], 200);
        } else {
            return response()->json([
                'status'  => false,
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
                'status'  => true,
                'message' => 'Data siswa berhasil dihapus.',
            ], 200);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Data siswa tidak ditemukan.',
            ], 404);
        }
    }
}
