<?php

namespace App\Controllers;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelBatalyon;
use App\Models\ModelKomando;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelBatalyon = new ModelBatalyon();
        $this->ModelKomando = new ModelKomando();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'batalyon' => $this->ModelBatalyon->AllData(),
            'komando' => $this->ModelKomando->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $dw = $this->ModelWilayah->DetailData($id_wilayah);
        $data = [
            'judul' => $dw['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah), 
            'batalyon' => $this->ModelBatalyon->AllDataPerWilayah($id_wilayah), 

        ];
        return view('v_template_front_end', $data);
    }

    public function Komando($id_komando)
    {
        $dk = $this->ModelKomando->DetailData($id_komando);
        $data = [
            'judul' => $dk['komando'],
            'page' => 'v_batalyon_per_komando',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'batalyon' => $this->ModelBatalyon->AllDataPerKomando($id_komando), 

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailBatalyon($id_batalyon)
    {
        $batalyon = $this->ModelBatalyon->DetailData($id_batalyon);
        $data = [
            'judul' => $batalyon['nama_batalyon'],
            'page' => 'v_detail_batalyon',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'batalyon' => $batalyon,

        ];
        return view('v_template_front_end', $data);
    }
}
