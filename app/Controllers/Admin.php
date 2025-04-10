<?php

namespace App\Controllers;

use App\Models\ModelSetting;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'menu'  => 'dashboard',
            'page' => 'v_dashboard',
        ];
        return view('v_template_back_end', $data);
    }

    public function Setting(): string
    {
        $data = [
            'judul' => 'Setting',
            'menu'  => 'setting',
            'page' => 'v_setting',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Kodam(): string
    {
        $data = [
            'judul' => 'Kodam',
            'menu'  => 'Kodam',
            'page' => 'v_kodam',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Lantamal(): string
    {
        $data = [
            'judul' => 'Lantamal',
            'menu'  => 'Lantamal',
            'page' => 'v_lantamal',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function PostSetting(): string
    {
        $data = [
            'judul' => 'PostSetting',
            'page' => 'v_setting',
        ];
        return view('v_template_back_end', $data);
    }
    
    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'coordinate_wilayah' => $this->request->getPost('coordinate_wilayah'),
            'zoom_view' => $this->request->getPost('zoom_view'),
        ];
        $this->ModelSetting->UpdateData($data);
        session()->setFlashdata('pesan', 'Settingan Web Telah Diupdate !!!');
        return redirect()->to('Admin/Setting');
    }
}
