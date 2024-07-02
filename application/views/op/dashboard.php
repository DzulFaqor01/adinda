<h1>Selamat Datang, <?=user_info('nama');?></h1>
<p>&nbsp;</p>
<div class="row">	
	 
	 
	 
	 <div class="col-lg-3 col-xs-6"> <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3><?=$pelanggan;?></h3>
            <p>Jumlah Pelanggan</p>
        </div>
        <div class="icon">
            <span class="fa fa-globe"></span>
        </div>
        <a href="<?=base_url(akses().'/mitra/pelanggan');?>" class="small-box-footer">
            Atur Konten <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div><!-- ./col -->

	 
	 
	 
	 
	 <div class="col-lg-3 col-xs-6"> <!-- small box -->             
         <div class="small-box bg-aqua">
            <div class="inner">
                 <h3><?=$produk;?></h3>
                 <p>
					Produk
				 </p>
            </div>
            <div class="icon">
                <span class="fa fa-cubes"></span>
            </div>
            <a href="<?=base_url(akses().'/produk/produk');?>" class="small-box-footer">
                Lihat Daftar Produk <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div><!-- ./col -->
	
	
	
	
	
	
	
	
	
	
</div>