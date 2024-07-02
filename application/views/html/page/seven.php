
    <main class="site_main">
      <!-- top section-->
      <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container text-white" >
          <h2 class="section_tit margin_bottom text-white"><span>History Belanja</span></h2>
          <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">History Belanja</a></li>
            </ol>
          </nav>
        </div>
      </section>
      
      <!--my bag section-->
      <section class="mybag">
        <div class="container">
          
          
          <?php
echo asset_datatables();
?>


        <table style="border: 1px solid grey; width:100%;">
            
            
            <thead style="background-color: #f2f2f2;">
              <tr  style="border: 1px solid grey;"> 

                
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; ">Tanggal</th>
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; ">Invoice</th>
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; ">Total Belanja</th>
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; ">Ongkos Kirim</th>
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; ">Total Bayar</th>
	<th class="text-center text-secondary font-weight-bold" style="border: 1px solid grey; "> Status</th>
                
                
              </tr>
            </thead>
            <tbody>
                
                
       
       
                
                
<?php
if(!empty($data))
{
	foreach($data as $row){
	?>
	
	
	   
              
        <tr  style="border: 1px solid grey;"> 
            <th class="text-center" style="border: 1px solid grey; ">
                <?=date("d-m-Y",strtotime($row->tanggal));?>
            </th>
            
            <th class="text-center" style="border: 1px solid grey; "><?=$row->invoice;?></th>
            
            <th class="text-center" style="border: 1px solid grey; "> 
                <?=number_format($row->total,0);?>
            </th>
            
            <th class="text-center" style="border: 1px solid grey; "><?=number_format($row->ongkir,0);?></th>
            
            <th class="text-center" style="border: 1px solid grey; "><?=number_format($row->total+$row->ongkir,0);?></th>
            
            
            
            
            <th class="text-center" style="border: 1px solid grey; "> 
                <?php
			if($row->status=="draft")
			{
				?>
				<a href="<?=base_url();?>produk/histori/bayar/<?=$row->penjualan_id;?>" class="btn btn-success btn-xs btn-flat">Bayar</a>
				<?php
			}elseif($row->status=="konfirmasi"){
				?>
				Tahap Verifikasi Pembayaran
				<?php
			}elseif($row->status=="lunas"){
				?>
				Packing Item
				<?php
			}
			?>
            </th>
            
        </tr>
	<?php
	}
}
?>
            
            
            
            
            
            
            </tbody>
          </table>
  
          
          
          
          
          
          
        </div>
      </section>
      <!--  related products-->
      <section class="related pt-0">
        <div class="container">
          <h3 class="_bold section_tit mb-4"><span>Cari produk lain</span></h3>
          <div class="productsSlider owl-carousel pl-0 pr-0">
            
            
           
           
    <?php
$sql = "SELECT * FROM produk ORDER BY produk_id DESC LIMIT 8";
$dTerbaru = $this->m_db->get_query_data($sql);
if (empty($dTerbaru)) {
    $dTerbaru = produk_terbaru(6);
}

if (!empty($dTerbaru)) {
    foreach ($dTerbaru as $rBaru) {
        $stokTersisa = $rBaru->stok - $rBaru->jumlah_beli;

        if ($stokTersisa > 0) {
            $urlPhotoBaru = base_url().'assets/no_picture.jpg';
            $photoBaru = produk_photo($rBaru->produk_id, 1);
            if (!empty($photoBaru)) {
                foreach ($photoBaru as $rPhotoBaru) {
                    $urlPhotoBaru = base_url().'assets/images/produk/thumbs/400/'.$rPhotoBaru->photo;
                    $pathPhotoBaru = FCPATH.'assets/images/produk/thumbs/400/'.$rPhotoBaru->photo;
                    if (!file_exists($pathPhotoBaru)) {
                        $urlPhotoBaru = base_url().'assets/no_picture.jpg';
                    }
                }
            }
            $slugBaru = string_create_slug($rBaru->nama_produk);
            $urlProdukBaru = base_url().'produk/'.$rBaru->produk_id.'/'.$slugBaru;
            ?>
            
            
            
            <div class="product">         
              <div class="_img"><a href="<?=$urlProdukBaru;?>"><img style="height:250px;"src="<?=$urlPhotoBaru;?>" alt="pic"/></a></div>
              <div class="new">New</div><a href="<?=$urlProdukBaru;?>">
                <h3 class="product-tit"><?=$rBaru->nama_produk;?></h3>
                <p class="price">Rp <?=number_format($rBaru->harga, 0);?></p>
                <div class="rate">
                  
                </div></a><a class="addToCart btn_style dark_btn" href="<?=base_url();?>produk/add/<?=$rBaru->produk_id;?>">ADD TO CART <i class="ml-2 fas fa-cart-plus"></i></a>
            </div>
            <?php
        }
    }
}
?>
           
           
          
          
          
          
          
          </div>
        </div>
      </section>
    </main>
    <!-- start footer-->
    
   