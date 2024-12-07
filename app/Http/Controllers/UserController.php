<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userBeranda() {
        // $pesananUser = Pesanan::select('pesanan.id', 'pesanan.name', 'pesanan.email', 'pesanan.paket', 'pesanan.kategori', 'id_member')->get();
        $pesananUser = Pesanan::where('id_member', Auth::user()->id)->get();
        $user = Auth::user();
        return view('user.user', compact('pesananUser'));       
    }

    public function buatPesanan() {
        return view('user.form-input');
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
            return redirect()->route('user.user-beranda')->with('success', __('berhasil mendaftar'));
        } catch (\Throwable $th) {
            return redirect()->route('user.form-input')->with('error', __($th->getMessage()));
        }
    }

    public function formEdit($id) {
        $getDataId = Pesanan::select('id', 'name', 'email', 'paket', 'kategori')->where('id', $id)->first();
        return view('user.form-edit', compact('getDataId'));
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
            return redirect()->route('user.user-beranda')->with('success', __('berhasil mengedit pesanan'));
        } catch (\Throwable $th) {
            return redirect()->route('user.user-beranda')->with('error', __($th->getMessage()));
        }
    }

    public function deletePesanan($id) {
        
        try {
            $deletePesanan = Pesanan::where('id', $id)->delete();
            return redirect()->route('user.user-beranda')->with('success', __('berhasil mengedit pesanan'));
        } catch (\Throwable $th) {
            return redirect()->route('user.user-beranda')->with('error', __($th->getMessage()));
        }
    }
}
