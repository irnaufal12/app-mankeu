<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailVerified;
use App\Models\Tabungan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $getId = User::where('email', '=', $request->email)->first();
        $getDate = Carbon::now()->addMinutes(30);
        $getHash = Hash::make($getId);

        $link = request()->getHttpHost();
        // return dd($link);
        // "route('register-verifying', ['id' => $getId->id, 'date' => $getDate]";
        $email = [
            'title' => 'VERIFIKASI EMAIL ANDA',
            'link' => $link,
            'id' => $getId->id,
            'date' => $getDate,
            // 'hash' => $getHash,
        ];

        Mail::to($request->email)->send(new MailVerified($email));


        return redirect()->route('register')->with('success', 'Permintaan verifikasi telah dikirim, silahkan cek email.');
    }

    public function verifying($id, $date)
    {        
        if(Carbon::now()->gte($date)) {
            
            return redirect()->route('register')->with('success', 'Link expired');        
        }
        
        User::find($id)->update([
            'email_verified_at' => Carbon::now()
        ]);

        Tabungan::create([
            'user_id' => $id,
            'saldo' => 0,
            'hutang' => 0,
            'difference' => 0,
        ]);

        return redirect()->route('login')->with('success', 'Email anda telah berhasil diverifikasi, silahkan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        // return dd($credentials);

        if (Auth::guard('user')->attempt($credentials)) {
            $check = User::where('email', '=', $credentials['email'])->first();
            if($check->email_verified_at == NULL) {
                return redirect()->route('login')->with('fail', 'Email belum diverifikasi');
            }
            return redirect()->intended('home');
        } else {
            return redirect()->route('login')->with('fail', 'Login Failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
