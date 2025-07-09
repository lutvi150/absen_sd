<?php
namespace App\Http\Controllers;

use App\Models\no;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerNotif extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendWhatsapp()
    {
        $userkey = env('zenziva_userkey');
        $apiKey  = env('zenziva_apikey');
        $telepon = '081111111111';
        // costume message
        $jam = date('H');
        if ($jam >= 5 && $jam < 11) {
            $waktu= "Selamat Pagi";
        } elseif ($jam >= 11 && $jam < 15) {
            $waktu= "Selamat Siang";
        } elseif ($jam >= 15 && $jam < 18) {
            $waktu= "Selamat Sore";
        } else {
            $waktu= "Selamat Malam";
        }
        $sekolah= env('APP_NAME');
        $message  = "$waktu, ini adalah pesan otomatis dari sistem absensi $sekolah, anak anda tidak hadir hari ini, silahkan cek aplikasi untuk informasi lebih lanjut.";
        $response = Http::asForm()->post('https://console.zenziva.net/wareguler/api/sendWA/', [
            'userkey' => $userkey,
            'passkey' => $apiKey,
            'to'      => $telepon,
            'message' => $message,
        ]);

        $result = $response->json(); // atau $response->body() jika ingin raw string
// Contoh handling jika gagal
        if ($response->failed()) {
            // log error atau tampilkan error
            dd('Gagal kirim: ' . $response->status());
        }
    }
    function sendMessage()  {
        
    }
    public function checkBalance()
    {
        $userkey  = env('zenziva_userkey');
        $apiKey   = env('zenziva_apikey');
        $response = Http::get('https://console.zenziva.net/api/balance/', [
            'userkey' => $userkey,
            'passkey' => $apiKey,
        ]);
        if ($response->successful()) {
            $data = $response->json();
            return response()->json([
                'status'  => true,
                'balance' => $data['balance'],
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to retrieve balance',
            ], 500);
        }
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(no $no)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(no $no)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, no $no)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(no $no)
    {
        //
    }
}
