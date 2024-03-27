<?php

namespace App\Controllers;
Use App\Models\UsersModel;
class AuthController extends BaseController
{
    public function register()
    {
        echo view('templates/admin/header');
        echo view('pages/auth/register');
        echo view('templates/admin/footer');
    }

    public function login()
    {
        echo view('templates/admin/header');
        echo view('pages/auth/login');
        echo view('templates/admin/footer');
    }
    


public function RegisterSave()
    {
        if (!$this->validate([
            'nia' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[t_users.nia]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'nia sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_confirmation' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'nia' => $this->request->getVar('nia'),
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        
        ]);
        return redirect()->to('/login');
    }
    public function LoginAction()
    {
        $users = new UsersModel();
        $nia = $this->request->getVar('nia');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'nia' => $nia,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                if($dataUser->is_active == 0 ){
                    return redirect()->to(base_url('/error'));
                }else{
                    session()->set([
                        'nia' => $dataUser->nia,
                        'nama' => $dataUser->nama,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('/dashboard'));
                }
                
            } else {
                session()->setFlashdata('error', 'nia & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'nia & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}