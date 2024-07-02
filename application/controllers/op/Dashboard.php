<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('m_db');		
		
		$this->load->model('pelanggan_model','mod_pelanggan');
		$this->load->model('produk_model','mod_produk');
		if(akses()!="op")
		{
			$this->login_model->user_logout();
		}
		
	}
		
	
	public function index()
{       
    $meta['judul'] = "Dashboard Administrator";
    
    $query = $this->mod_pelanggan->pelanggan_data();
    $data['pelanggan'] = count($query);

    $produk = $this->mod_produk->produk_data();
    $data['produk'] = 0;

    foreach ($produk as $item) {
        if ($item->jumlah_beli == 0) {
            $data['produk']++;
        }
    }

    $this->load->view('tema/header', $meta);
    $this->load->view(akses() . '/dashboard', $data);
    $this->load->view('tema/footer');
}

}