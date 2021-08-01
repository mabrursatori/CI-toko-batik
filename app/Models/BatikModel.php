<?php

namespace App\Models;

use CodeIgniter\Model;

class BatikModel extends Model
{
    protected $table = 'batik';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id', 'name', 'slug', 'image', 'ukuran', 'kain_id', 'deskripsi', 'date', 'shopee', 'bukalapak', 'tokopedia',
        'harga_jual', 'harga_beli', 'populer'
    ];
    protected $batik;
    protected $batik_motif;
    public function __construct()
    {
        $this->batik = \Config\Database::connect()->table('batik');
        $this->batik_motif = \Config\Database::connect()->table('batik_motif');
    }
    public function getBatik($slug = false)
    {
        if ($slug) {
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

        $result = $this->batik->select('batik.*, kain.name as kainBatik')
            ->join('kain', 'kain.id = batik.kain_id')->orderBy('date', 'DESC')
            ->get()->getResultArray();

        for ($i = 0; $i < count($result); $i++) {

            $array = $this->batik_motif->select('motif.name as namaMotif')
                ->join('motif', 'motif.id = batik_motif.motif_id')
                ->where('batik_motif.batik_id', $result[$i]['id'])
                ->get()->getResultArray();
            $motifs = [];
            foreach ($array as $arr) {
                array_push($motifs, $arr['namaMotif']);
            }

            $result[$i]['motifs'] = $motifs;
        }

        return $result;
    }

    public function searchBatik($keyword)
    {
        return $this->table('batik')->like('name', $keyword);
    }

    public function insertMotifBatik($id, $motifs)
    {
        foreach ($motifs as $motif) {
            $this->batik_motif->insert([
                'batik_id' => $id,
                'motif_id' => $motif
            ]);
        }
    }

    public function deleteMotifBatik($id)
    {
        $this->batik_motif->where('batik_id', $id)
            ->delete();
    }

    public function getBatikImageByID($id)
    {
        return $image = $this->batik->getWhere(['id' => $id])->getFirstRow()->image;
    }

    public function getLastID()
    {

        try {
            return $this->batik->get()->getLastRow()->id;
        } catch (\Exception $e) {
            return '10';
        }
    }

    public function deleteBatik($id)
    {
        $this->batik->where('id', $id)->delete();
    }
}
