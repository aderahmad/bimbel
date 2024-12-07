<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminBeranda() {
        $pesanan = Pesanan::select('id', 'name', 'email', 'paket', 'kategori')->get();
        return view('admin.admin', compact('pesanan') );
    }

    public function buatPesanan() {
        return view('admin.form-input');
    }

    public function simpanPensanan(Request $req) {
        try {
            $this->validate($req, [
            'name' => 'required|string|max:225',
            'email' => 'required|string|email',
            ]);
            $user = Auth::user();
            $datas = $req->all();
            $save = new Pesanan;
            $save->name = $datas['name'];
            $save->email = $datas['email'];
            $save->paket = $datas['paket'];
            $save->kategori = $datas['kategori'];
            $save->id_member = $user->id;
            $save->save();
            return redirect()->route('admin.admin-beranda')->with('success', __('berhasil mendaftar'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.form-input')->with('error', __($th->getMessage()));
        }
    }

    public function formEdit($id) {
        $getDataId = Pesanan::select('id', 'name', 'email', 'paket', 'kategori')->where('id', $id)->first();
        return view('admin.form-edit', compact('getDataId'));
    }

    public function editPesanan(Request $req, $id) {
        $this->validate($req, [
            'name' => 'required|string|max:225',
            'email' => 'required|string|email',
        ]);

        try {
            $datas = $req->all();
            Pesanan::where('id', $id)->update([
                'name' => $datas['name'],
                'email' => $datas['email'],
                'paket' => $datas['paket'],
                'kategori' => $datas['kategori'],
            ]);
            return redirect()->route('admin.admin-beranda')->with('success', __('berhasil mengedit pesanan'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin-beranda')->with('error', __($th->getMessage()));
        }
    }

    public function deletePesanan($id) {
        try {
            Pesanan::where('id', $id)->delete();
            return redirect()->route('admin.admin-beranda')->with('success', __('berhasil mengedit pesanan'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin-beranda')->with('error', __($th->getMessage()));
        }
    }

}
