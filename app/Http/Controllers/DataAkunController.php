<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;


class DataAkunController extends Controller
{
    public function index()
    {
        $data_akun = Akun::paginate(10);
        return view('konten.akun', [
            'akun' => $data_akun,
        ], compact('data_akun'));

    }
    //
    public function viewTambah()
    {
        return view('konten.akun_olah');
    }

    public function tambah(Request $request)
    {
        $data = Akun::create($request->all());
        $data->save();

        return redirect('/akun');
    }

    public function editAkun($kode_akun)
    {
        $data = Akun::find($kode_akun); // Ganti 'Post' dengan nama model Anda
        return view('konten.edit_akun', compact('data'));
    }

    public function updateAkun(Request $request, $id)
    {
        $updateData = Akun::find($id);
        $updateData->update($request->all());
        $data_akun = Akun::all();
        // return redirect('/akun');
        return redirect()->route('akun', compact('data_akun'));
    }

    public function delete($kode_akun)
    {
        $data = Akun::find($kode_akun);
        $data->delete();
        return redirect('/akun');
    }

}
