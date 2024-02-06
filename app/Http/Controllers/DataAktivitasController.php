<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;

class DataAktivitasController extends Controller
{
    public function index(Request $request)
    {
        $data_aktivitas = Aktivitas::all();
        return view('konten.aktivitas', [
            'aktivitas' => $data_aktivitas,
        ], compact('data_aktivitas'));
        
    }
    //
    public function viewTambah()
    {
        return view('konten.aktivitas_olah');
    }

    public function tambah(Request $request)
    {
        $data = Aktivitas::create($request->all());
        $data->save();

        return redirect('/aktivitas');
    }

    public function editAktivitas($id)
    {
        $data = Aktivitas::find($id); // Ganti 'Post' dengan nama model Anda
        return view('konten.edit_aktivitas', compact('data'));
    }

    public function updateAktivitas(Request $request, $id)
    {
        $updateData = Aktivitas::find($id);
        $updateData->update($request->all());
        $data_akun = Aktivitas::all();
        // return redirect('/akun');
        return redirect()->route('aktivitas', compact('data_aktivitas'));
    }

    public function delete($id)
    {
        $data = Aktivitas::find($id);
        $data->delete();
        return redirect('/aktivitas');
    }
}
