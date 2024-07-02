
    <!-- start main sections-->
    <main class="site_main">
      <!-- start hero section-->
      <section id="hero_section">
        <div class="heroSlider owl-carousel">
          <div class="heroSlide" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg')" data-dot="01">
            <div class="container justify-content-start align-items-center">
              <div class="carousel-Data text-white">
                <h1 class="animated fadeInDown slider-desc">Summer <br> Collection</h1>
                <h2 class="slider-title animated fadeInDown">New Amazing Prices</h2>
                <h3 class="animated fadeInUp slider-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, Proin</h3><a class="animated fadeInUp slider-desc btn_style solid_btn" href="#">SHOP NOW</a>
              </div>
            </div>
          </div>
          <div class="heroSlide" style="background:url('<?= base_url(); ?>assets/front/image/slider2.jpg')" data-dot="02">
            <div class="container justify-content-start align-items-center">
              <div class="carousel-Data text-white">
                <h1 class="animated fadeInDown slider-desc">New <br> Collection   </h1>
                <h2 class="animated fadeInDown slider-title">Spring & Summer</h2>
                <h3 class="animated fadeInUp slider-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, Proin</h3><a class="animated fadeInUp slider-desc btn_style solid_btn" href="#">SHOP NOW</a>
              </div>
            </div>
          </div>
          <div class="heroSlide" style="background:url('<?= base_url(); ?>assets/front/image/slider3.jpg')" data-dot="03">
            <div class="container justify-content-start align-items-center">
              <div class="carousel-Data text-white">
                <h1 class="animated fadeInDown slider-desc">New Offer 50%  </h1>
                <h2 class="animated fadeInDown slider-title">Brand New Collection</h2>
                <h3 class="animated fadeInUp slider-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, Proin</h3><a class="animated fadeInUp slider-desc btn_style solid_btn" href="#">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- posters-->
      <section class="p-0">
        <div class="row">
          <div class="col-sm-6 pr-0 line-height-0"><img class="w-100" src="<?= base_url(); ?>assets/front/image/sale1.jpg" alt="pic"/></div>
          <div class="col-sm-6 pl-0 line-height-0"><img class="w-100" src="<?= base_url(); ?>assets/front/image/sale2.jpg" alt="pic"/></div>
        </div>
      </section>
      <!-- products section-->
      <section class="products">
        <div class="container"><nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="nav-newesProducts-tab" data-toggle="tab" href="#nav-newesProducts" role="tab" aria-controls="nav-newesProducts" aria-selected="true"><h2>Produk Kami</h2></a>

</div>
</nav>
<div class="tab-content" id="nav-tabContent">
          <!-- start our new products-->
<div class="tab-pane animated fadeInUp active" id="nav-newesProducts" role="tabpanel" aria-labelledby="nav-newesProducts-tab">
          <div class="productsSlider owl-carousel">
              
            
            
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
              <div class="_img">
                  <a href="<?=$urlProdukBaru;?>">
                      <img src="<?=$urlPhotoBaru;?>" style="height:300px; width: auto;" alt="pic"/></a>
                      </div>
              <div class="new">New</div>
              <a href="<?=$urlProdukBaru;?>">
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
            
            
            
            
          </div></div>
          
<div class="tab-pane animated fadeInUp" id="nav-topProducts" role="tabpanel" aria-labelledby="nav-topProducts-tab">
          <div class="productsSlider owl-carousel">
            <!-- isinya-->
          </div></div>
<div class="tab-pane animated fadeInUp" id="nav-bestOffers" role="tabpanel" aria-labelledby="nav-bestOffers-tab">
          <div class="productsSlider owl-carousel">
               <!-- isinya-->
              
          </div></div>

<div class="tab-pane animated fadeInUp" id="nav-newDrop" role="tabpanel" aria-labelledby="nav-newDrop-tab">
          <div class="productsSlider owl-carousel">
               <!-- isinya-->
              
          </div></div>
</div>
        </div>
      </section>
      <!-- subscribe PopUP-->
      
    </main>
    <!-- start footer-->
