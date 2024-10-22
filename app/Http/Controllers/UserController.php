<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\message;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    //
    public function pelanggan()
    {
        $data['pelanggan'] = User::where('level','=','pelanggan')->get();
        return view('pelanggan',$data);
    }

    public function caripelanggan(Request $request)
    {
        $data['pelanggan'] = User::where('level','=','pelanggan')->where('name','LIKE','%'.$request->cari.'%')->get();
        return view('pelanggan',$data);
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function landing()
    {
        return view('landing-page');
    }

    public function createuser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no' => $request->no,
            'password' => bcrypt($request->password),
            'level' => 'pelanggan',
        ]);
        Alert::success('Sukses', 'Register Berhasil');
        return redirect('/');
    }

    public function auth(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($validate)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->level === 'admin') {
                return redirect('/index');
            }
            else {
                // $id_user = auth()->user()->id;
                return redirect('/home');
            }
        }
        Alert::error('Peringatan', 'Username atau Password salah');
        return redirect('/');

    }

    public function order()
    {
        $data['order'] = Keranjang::with('user','item')->get();
        // dd($data['order']);
        return view('pesanan', $data);
    }

    public function findorder(Request $request)
    {
        $search = $request->cari;
        $data['order'] = Keranjang::whereHas('item', function ($query) use ($search) {
        $query->where('name', 'LIKE', '%'.$search.'%');
        })->orWhereHas('user', function ($query) use ($search) {
        $query->where('name', 'LIKE', '%'.$search.'%');
        })->orWhere('status', 'LIKE', '%'.$search.'%')->get();
        return view('pesanan', $data);
    }

    public function updateorder(Request $request)
    {
        keranjang::where('status', 'Sudah Dipesan')->update([
            'status' => 'Sudah Sampai'
        ]);
        return redirect()->back();
    }

    public function hapusorder(Request $request)
    {
        keranjang::where('id_user',$request->id_user)->delete();
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function contact(Request $request)
    {
        message::create([
            'name' => $request->name,
            'email' => $request->email,
            'no' => $request->no,
            'message' => $request->no,
        ]);
        return redirect('/');
    }
}
