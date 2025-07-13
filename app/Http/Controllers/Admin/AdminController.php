<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('admin.dashboard', ['title' => $title]);
    }
    public function guru()
    {
        $title = 'Dashboard';
        return view('guru.dashboard', ['title' => $title]);
    }
    function data_kelas()
    {
        $title = 'Data Kelas';
        return view('admin.data_kelas', ['title' => $title]);
    }
    function data_siswa()
    {
        $title = 'Data Siswa';
        return view('admin.data_siswa', ['title' => $title]);
    }
    function data_guru()
    {
        $title = 'Data Guru';
        return view('admin.data_guru', ['title' => $title]);
    }
    function data_mapel()
    {
        $title = 'Data Mata Pelajaran';
        return view('admin.data_mapel', ['title' => $title]);
    }
    function data_jadwal()
    {
        $title = 'Data Jadwal';
        return view('admin.data_jadwal', ['title' => $title]);
    }
    function data_presensi()
    {
        $title = 'Data Presensi';
        return view('admin.data_presensi', ['title' => $title]);
    }
}
