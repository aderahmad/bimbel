<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Hash;

class RegisterController extends Controller
{
    public function formRegister() {
        return view('member.formRegister');
    }
    public function simpanRegister(Request $req) {
        try {
            $this->validate($req, [
            'name' => 'required|string|max:225',
            'username' => 'required|max:255',
            'email' => 'required|string|email|unique:member',
            'password' => 'required|string|min:8',
        ]);

            $datas = $req->all();
            $save_data = new Member;
            $save_data->name = $datas['name'];
            $save_data->username = $datas['username'];
            $save_data->email = $datas['email'];
            $save_data->level = $datas['level'];
            $save_data->password = Hash::make($datas['password']);
            $save_data->save();
            return redirect()->route('member.form-register')->with('success', __('berhasil mendaftar'));
        } catch (\Throwable $th) {
            return redirect()->route('member.form-register')->with('error', __($th->getMessage()));
        }
    }
}
