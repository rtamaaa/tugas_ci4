<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('view_login');
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);
                $token = getenv('TELEGRAM_BOT_TOKEN');
        
                $datas = [
                'text' =>"pengguna $dataUser->name login ke sistem ",
                'chat_id' => getenv('TELEGRAM_CHAT_ID')  
                ];
                        
                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));
                return redirect()->to(base_url('/dosen'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}