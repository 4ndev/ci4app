<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\Usuarios;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];
    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Iniciar sesión',
            'validation' => null
        ];

        return view('backend/pages/auth/login', $data);
    }

    public function loginHandler()
    {
        $isEmail = filter_var($this->request->getPost('email'), FILTER_VALIDATE_EMAIL);


        $isValid = $this->validate([
            'email' =>  [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please, check the email field.',
                    'is_not_unique' => 'Email not found'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[35]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters',
                    'max_length' => 'Password must be less than 35 characters'
                ]
            ],
        ]);

        if (!$isValid) {
            //return redirect()->back()->withInput()->with('validation', $this->validator);
            return view('backend/pages/auth/login', ['pageTitle' => 'Iniciar sesión', 'validation' => $this->validator]);
        } else {
            $usuario = new Usuarios();
            $user = $usuario->where('email', $this->request->getVar('email'))->first();
            //var_dump($user); exit;
            $check_password = Hash::check($this->request->getVar('password'), $user['password']);
            //return redirect()->route('admin.home');

            if(!$check_password) {
                return redirect()->route('admin.login.form')->with('fail', 'Wrong password or email')->withInput();
            } else {
                CIAuth::setCIAuth($user);
                return redirect()->route('admin.home');
            }
        }
    }
}
