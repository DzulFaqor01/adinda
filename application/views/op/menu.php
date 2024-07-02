<?php
$menu=array(	
	'Produk'=>array(		
		'icon'=>'fa fa-cube',
		'slug'=>'produk',
		'child'=>array(				
				'Kategori'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/produk/kategori",
					'target'=>"",
					),
				'Brand'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/produk/merek",
					'target'=>"",
					),
				'Size'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/produk/ukuran",
					'target'=>"",
					),				
				'Produk'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/produk/produk",
					'target'=>"",
					),
			),
	),
	'Transaksi'=>array(		
		'icon'=>'fa fa-shopping-cart',
		'slug'=>'transaksi',
		'child'=>array(				
				'Pesanan Masuk'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/transaksi/orderan",
					'target'=>"",
					),	
			),
	),	
	'Mitra'=>array(		
		'icon'=>'fa fa-user',
		'slug'=>'mitra',
		'child'=>array(
				'Supplier'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/mitra/supplier",
					'target'=>"",
					),		
				'Pelanggan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/mitra/pelanggan",
					'target'=>"",
					),			
			),
	),
	'Laporan'=>array(		
		'icon'=>'fa fa-file-o',
		'slug'=>'laporan',
		'child'=>array(				
				'Penjualan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/laporan/penjualan",
					'target'=>"",
					),
			),
	),
	'CMS'=>array(		
		'icon'=>'fa fa-globe',
		'slug'=>'cms',
		'child'=>array(
				'Semua Halaman'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/cms/halaman",
					'target'=>"",
					),
				'Tambah Halaman'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/cms/halaman/add",
					'target'=>"",
					),
			),
	),
	'Konfigurasi'=>array(		
		'icon'=>'fa fa-wrench',
		'slug'=>'konfigurasi',
		'child'=>array(
				'Aplikasi'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/konfigurasi",
					'target'=>"",
					),			
			),
	),
	
	'User'=>array(		
		'icon'=>'fa fa-wrench',
		'slug'=>'pengguna',
		'child'=>array(
				'Admin'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/pengguna",
					'target'=>"",
					),			
			),
	),
	
);