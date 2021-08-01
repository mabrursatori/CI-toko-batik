<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $batik;
    protected $batik_motif;
    protected $gambar;
    protected $motif;
    protected $kain;
    protected $artikel;
    protected $toko;
    protected $user;
    public function __construct()
    {
        $this->batik = \Config\Database::connect()->table('batik');
        $this->gambar = \Config\Database::connect()->table('gambar');
        $this->batik_motif = \Config\Database::connect()->table('batik_motif');
        $this->motif = \Config\Database::connect()->table('motif');
        $this->kain = \Config\Database::connect()->table('kain');
        $this->artikel = \Config\Database::connect()->table('artikel');
        $this->toko = \Config\Database::connect()->table('toko');
        $this->user = \Config\Database::connect()->table('user');
    }

    public function getAllImageBanner()
    {
        return $this->gambar->orderBy('ordinal', 'ASC')->get()->getResultArray();
    }

    public function getFourPopularBatik()
    {
        return $this->batik->orderBy('date', 'DESC')->getWhere(['populer' => 1], 4)->getResultArray();
    }

    public function getFourNewBatik()
    {
        return $this->batik->orderBy('date', 'DESC')->get(4)->getResultArray();
    }

    public function getOtherBatiks()
    {

        try {
            $one = $this->batik->orderBy('date', 'DESC')->get()->getFirstRow()->id;
            $two = $this->batik->orderBy('date', 'DESC')->limit(1, 1)->get()->getFirstRow()->id;
            $three = $this->batik->orderBy('date', 'DESC')->limit(1, 2)->get()->getFirstRow()->id;
            $four = $this->batik->orderBy('date', 'DESC')->limit(1, 3)->get()->getFirstRow()->id;
            return $this->batik->where('id !=', $one)
                ->where('id !=', $two)
                ->where('id !=', $three)
                ->where('id !=', $four)
                ->get(4)->getResultArray();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getAllMotif()
    {
        return $this->motif->get()->getResultArray();
    }

    public function getAllKain()
    {
        return $this->kain->get()->getResultArray();
    }

    public function getAllArtikel()
    {
        return $this->artikel->get()->getResultArray();
    }

    public function getShopee()
    {
        return $this->toko->getWhere(['name' => 'shopee'])->getFirstRow()->link;
    }
    public function getTokopedia()
    {
        return $this->toko->getWhere(['name' => 'tokopedia'])->getFirstRow()->link;
    }
    public function getBukalapak()
    {
        return $this->toko->getWhere(['name' => 'bukalapak'])->getFirstRow()->link;
    }
    public function getWhatsapp()
    {
        return $this->toko->getWhere(['name' => 'whatsapp'])->getFirstRow()->link;
    }
    public function getInstagram()
    {
        return $this->toko->getWhere(['name' => 'instagram'])->getFirstRow()->link;
    }

    public function getBatik($slug)
    {
        $array = $this->batik->select('batik.*, kain.name as kainBatik')
            ->join('kain', 'kain.id = batik.kain_id')
            ->where('batik.slug', $slug)
            ->get()->getRowArray(0);

        $result = $this->batik_motif->select('motif.name as namaMotif')
            ->join('motif', 'motif.id = batik_motif.motif_id')
            ->where('batik_motif.batik_id', $array['id'])
            ->get()->getResultArray();
        $motifs = [];
        foreach ($result as $res) {
            array_push($motifs, $res['namaMotif']);
        }

        $array['motifs'] = $motifs;
        return $array;
    }

    public function getBatikByMotifID($id)
    {
        $array = $this->batik_motif->select('batik.*')
            ->join('batik', 'batik.id = batik_motif.batik_id')
            ->where('batik_motif.motif_id', $id)
            ->get()->getResultArray();
        return $array;
    }

    public function getBatikByKainID($id)
    {
        return $this->batik->getWhere(['kain_id' => $id])->getResultArray();
    }

    public function searchBatik($keyword)
    {
        $result = $this->batik->select('batik.*')
            ->like('batik.name', $keyword)
            ->get()->getResultArray();
        return $result;
    }

    public function getBatikByParam($param)
    {
        if ($param == 'new') {
            return $this->batik->orderBy('date', 'DESC')->get(11)->getResultArray();
        } elseif ($param == 'popular') {
            return $this->batik->orderBy('date', 'DESC')->getWhere(['populer' => 1])->getResultArray();
        } else {
            return $this->batik->orderBy('date', 'DESC')->get()->getResultArray();
        }
    }

    public function getArtikelByID($slug)
    {
        return  $this->artikel->getWhere(['slug' => $slug])->getRowArray();
    }

    public function getAuth()
    {

        return [
            'email' => $this->user->get()->getRowArray()['email'],
            'password' => $this->user->get()->getRowArray()['password']
        ];
    }
}
