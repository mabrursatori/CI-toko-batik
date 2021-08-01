<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\UserModel;

class Home extends BaseController
{
	protected $homeModel;
	protected $userModel;
	public function __construct()
	{
		$this->homeModel = new HomeModel();
		$this->userModel = new UserModel();
	}
	public function index()
	{
		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];

		if ($this->request->getVar('keyword')) {
			$data['batiks'] = $this->homeModel->searchBatik($this->request->getVar('keyword'));
			return view('pages/list', $data);
		}

		$data['banners'] = $this->homeModel->getAllImageBanner();
		$data['popularsBatik'] = $this->homeModel->getFourPopularBatik();
		$data['newBatiks'] = $this->homeModel->getFourNewBatik();
		$data['otherBatiks'] = $this->homeModel->getOtherBatiks();
		return view('pages/home', $data);
	}

	public function detail($slug)
	{
		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		$data['batik'] = $this->homeModel->getBatik($slug);
		return view('pages/detail', $data);
	}

	public function motif($id)
	{
		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		$data['batiks'] = $this->homeModel->getBatikByMotifID($id);
		return view('pages/list', $data);
	}

	public function kain($id)
	{
		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		$data['batiks'] = $this->homeModel->getBatikByKainID($id);
		return view('pages/list', $data);
	}

	public function more($param)
	{

		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		$data['batiks'] = $this->homeModel->getBatikByParam($param);
		return view('pages/list', $data);
	}

	public function artikel($slug)
	{
		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		$data['artikel'] = $this->homeModel->getArtikelByID($slug);
		$data['batiks'] = $this->homeModel->getFourNewBatik();
		return view('pages/artikel', $data);
	}

	public function login()
	{
		if (isset($_SESSION['auth'])) {
			return redirect()->to('/admin');
		}
		$auth = $this->homeModel->getAuth();

		if ($this->request->getVar('email') == $auth['email'] && $this->request->getVar('password') == $auth['password']) {
			$_SESSION['auth'] = true;
			$data = [
				'user' => $this->userModel->getUser()
			];
			return view('pages/admin/user/index', $data);
		}

		$data = [
			'motifs' => $this->homeModel->getAllMotif(),
			'kains' => $this->homeModel->getAllKain(),
			'artikels' => $this->homeModel->getAllArtikel(),
			'shopee' => $this->homeModel->getShopee(),
			'bukalapak' => $this->homeModel->getBukalapak(),
			'tokopedia' => $this->homeModel->getTokopedia(),
			'whatsapp' => $this->homeModel->getWhatsapp(),
			'instagram' => $this->homeModel->getInstagram()
		];
		return view('pages/login', $data);
	}

	public function logout()
	{
		$_SESSION = [];
		session_unset();
		session_destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------

}
