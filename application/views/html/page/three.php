

    <main class="site_main">
      <!-- top section-->
      <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container">
          <h2 class="section_tit margin_bottom"><span><?=$judulhalaman;?></span></h2>
          <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item text-white"><a class="text-white" href="#"><?=$judulhalaman;?></a></li>
            </ol>
          </nav>
        </div>
      </section>
      <!-- start categories-->
      
      
      </br>
       <section class="related pt-0">
        <div class="container">
          
          <div class="productsSlider owl-carousel pl-0 pr-0">
            
            
    
           
<?php
$dKategoriTerbaru = produk_kategori_data($kategoriid, 12);

if (!empty($dKategoriTerbaru)) {
    foreach ($dKategoriTerbaru as $rKategori) {
        // Periksa jumlah pembelian
        if ($rKategori->jumlah_beli != 1) {
            $photoKategori = produk_photo($rKategori->produk_id, 1);
            foreach ($photoKategori as $rPhotoKategori) {
            }
            $urlPhotoKategori = base_url() . 'assets/images/produk/thumbs/400/' . $rPhotoKategori->photo;
            $pathPhotoKategori = FCPATH . 'assets/images/produk/thumbs/400/' . $rPhotoKategori->photo;
            
            if (!file_exists($pathPhotoKategori) && !file_exists($pathPhotoKategori)) {
                $urlPhotoKategori = base_url() . 'assets/images/avatar/noavatar.jpg';
            }
            
            $slugKategori = string_create_slug($rKategori->nama_produk);
            $urlProdukKategori = base_url() . 'produk/' . $rKategori->produk_id . '/' . $slugKategori;
?>
		
		<div class="product">         
            <div class="_img"><a href="<?=$urlProdukKategori;?>"><img style="height:250px;" src="<?=$urlPhotoKategori;?>" alt="pic"/></a></div>
            <div class="new">New</div><a href="<?=$urlProdukKategori;?>">
                <h3 class="product-tit"><?=$rKategori->nama_produk;?></h3>
                <p class="price">Rp <?=number_format($rKategori->harga, 0);?></p>
                <div class="rate">
                </div></a><a class="addToCart btn_style dark_btn" href="<?=base_url();?>produk/add/<?=$rKategori->produk_id;?>">ADD TO CART <i class="ml-2 fas fa-cart-plus"></i></a>
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
    