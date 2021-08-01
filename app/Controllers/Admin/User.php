<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            return redirect()->to('/');
        }
        $data = [
            'user' => $this->userModel->getUser()
        ];
        return view('pages/admin/user/index', $data);
    }

    public function edit()
    {
        $data = [
            'user' => $this->userModel->getUser()
        ];
        return view('pages/admin/user/edit', $data);
    }

    public function update($id)
    {
        $this->userModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);
        return redirect()->to('/admin');
    }

    //--------------------------------------------------------------------

}
