<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('m_db');
	}
	
	function index()
	{
		$meta['judul']=baca_konfig('nama-aplikasi');
		$meta['judulhalaman']="Produk Kami";
		$meta['homepage']=TRUE;
		$this->load->view('html/headerfront',$meta);
		$this->load->view('html/page/first',$meta);
		$this->load->view('html/footerfront');
	}
}