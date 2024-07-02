

  
    
    
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
      <!-- product-->
      <section class="product_page">
        <div class="container">
            
            
             
   <?php
if(empty($data)) {
    redirect(base_url());
}
foreach($data as $rBaru) {    
}
$toko = toko_pusat();
$sStok = array(
    'produk_id' => $rBaru->produk_id,
    'toko_id' => $toko,
);

$harga = $rBaru->harga;
$promo_nilai = 0;
$promo_id = produk_promo_id($rBaru->produk_id);
if(!empty($promo_id)) {
    $promo_nilai = field_value('promo', 'promo_id', $promo_id, 'nilai');
    $harga = $rBaru->harga - $promo_nilai;
}

$stok_awal = $this->m_db->get_row('produk_stok', $sStok, 'stok');
$stok_jual = $this->m_db->get_row('produk_stok', $sStok, 'stok_jual');
$stok_mutasi = $this->m_db->get_row('produk_stok', $sStok, 'stok_mutasi');
$stok = $stok_awal - ($stok_jual + $stok_mutasi);
$N_merek = field_value('produk_merek', 'merek_id', $rBaru->merek_id, 'nama_merek');
$S_merek = string_create_slug($N_merek);
$N_ukuran = field_value('produk_ukuran', 'ukuran_id', $rBaru->ukuran_id, 'nama_ukuran');
$S_ukuran = string_create_slug($N_ukuran);
$N_kategori = field_value('produk_kategori', 'kategori_id', $rBaru->kategori_id, 'nama_kategori');
$S_kategori = string_create_slug($N_kategori);
$photoBaru = produk_photo($rBaru->produk_id, 1);
foreach($photoBaru as $rPhotoBaru) {                                
}
$urlPhotoBaru = base_url().'assets/images/produk/thumbs/400/'.$rPhotoBaru->photo;
$pathPhotoBaru = FCPATH.'assets/images/produk/thumbs/400/'.$rPhotoBaru->photo;
if(!file_exists($pathPhotoBaru)) {
    $urlPhotoBaru = base_url().'assets/images/avatar/noavatar.jpg';
}
$slugBaru = string_create_slug($rBaru->nama_produk);
$urlProdukBaru = base_url().'produk/'.$rBaru->produk_id.'/'.$slugBaru;
?>

<div class="row">
    <div class="col-lg-5">
        <!-- product slider-->
        <div class="singleProduct-slider">                               
            <a href="<?=base_url().'assets/images/produk/'.$rPhotoBaru->photo;?>"><img src="<?=$urlPhotoBaru;?>" alt="pic"/></a>
        </div>
    </div>
    <div class="col-lg-7">
        <!-- product info-->
        <div class="product-info">
            <div class="product_header">
                <h3 class="font-weight-bold text-capitalize m-0"><?=$rBaru->nama_produk;?></h3>
            </div>
            <div class="product_body">
                <h3>Rp <?=number_format($harga,0);?></h3>
                
                <p> <strong class="mr-2">Category :</strong><?=$N_kategori;?></p>
                <p> <strong class="mr-2">Brand :</strong><?=$N_merek;?></p>
                <p> <strong class="mr-2">Size :</strong><?=$N_ukuran;?></p>
                <p class="mb-4"><?=$rBaru->deskripsi;?></p>
                
                <?php
                if($stok > 0) {
                    echo validation_errors();
                    echo form_open(base_url('produk/add/'.$rBaru->produk_id), array('class' => 'form-horizontal'));
                ?>
                
                <input type="hidden" name="produkid" value="<?=$rBaru->produk_id;?>"/>
                <input type="hidden" name="qty" value="1"/>
                
                <div style="display:none;">
                    <textarea name="keterangan" class="form-control" placeholder="Buat keterangan tambahan seperti ukuran atau warna"><?=set_value('keterangan');?></textarea>
                </div>
                <br/>
                
                <div class="d-flex align-items-center">
                    <div class="quantity margin_right">
                        <!-- Quantity input hidden and set to 1 -->
                    </div>
                    <button class="btn_style solid_btn mr-3" type="submit"><i class="fas fa-cart-plus mr-2"></i> Add To Cart</button>
                </div>
                
                <?php
                    echo form_close();
                } else {
                    echo "STOK KOSONG";
                }
                ?>
                
            </div>
        </div>
    </div>
</div>

	
	
            
            
            
            
            
        </div>
      </section>
      <!-- related products         -->
      <section class="related pt-0">
        <div class="container">
          <h3 class="_bold section_tit mb-4"><span>Related Products</span></h3>
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
              <div class="_img"><a href="<?=$urlProdukBaru;?>"><img style="height:300px; width: auto;" src="<?=$urlPhotoBaru;?>" alt="pic"/></a></div>
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
   
  