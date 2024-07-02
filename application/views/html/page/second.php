
    <main class="site_main">
      <!-- top section-->
      <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container text-white" >
          <h2 class="section_tit margin_bottom text-white"><span>Keranjang Saya</span></h2>
          <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">My Bag</a></li>
            </ol>
          </nav>
        </div>
      </section>
      
      <!--my bag section-->
      <section class="mybag">
        <div class="container">
          
          
          
          
          
          <?php
$pembelian=$this->cart->contents();
if(!empty($pembelian))
{
echo form_open(base_url().'produk/keranjang');
?>
<input type="hidden" name="aksi" value="1"/>



        <table class="table table-responsive">
            
            
            <thead>
              <tr> 

                
                
                <th class="col-4 text-secondary font-weight-bold">Nama Produk</th>
                <th class="col-2 text-center text-secondary font-weight-bold">Harga</th>
                <th class="col-2 text-center text-secondary font-weight-bold">Jumlah</th>
                <th class="col-2 text-center text-secondary font-weight-bold">Subtotal</th>
                <th class="col-2 text-right text-secondary font-weight-bold">Delete</th>
              </tr>
            </thead>
            <tbody>
              
              
              	<?php
$i = 0;
if (!empty($pembelian)) {
    foreach ($pembelian as $item) {
        $i += 1;
        $id = $item['rowid'];

        // Fetch the photo details
        $this->db->select('photo');
        $this->db->from('produk_photo');
        $this->db->where('produk_id', $item['produk_id']);
        $query = $this->db->get();
        $photo_data = $query->row_array();
        $photo_name = !empty($photo_data) ? $photo_data['photo'] : 'no_picture.jpg';
        $photo_url = base_url().'assets/images/produk/thumbs/400/'.$photo_name;

        ?>
        
        <tr> 
            <th class="d-inline-flex align-items-center col-4">
                <img src="<?=$photo_url;?>" alt=""/>
                <p class="font-weight-bold"><?=$item['id'];?> - <?=$item['name'];?></p>
            </th>
            <th class="col-2 text-center">Rp <?=number_format($item['price'], 0);?></th>
            <th class="col-2 text-center"> 
                <div class="quantity">
                    <input type="text" name="info[<?=$i;?>][qty]" value="<?=$item['qty'];?>" readonly />
                </div>
            </th>
            <th class="col-2 text-center">Rp <?=number_format($item['subtotal'], 0);?></th>
            <th class="col-2 text-right"> 
                <a href="<?=base_url();?>produk/delete/<?=$id;?>"><i class="fas fa-trash-alt"></i></a>
            </th>
            <input type="hidden" name="info[<?=$i;?>][rowid]" value="<?=$item['rowid'];?>"/>
        </tr>

        <?php
    }
}
?>


              
              
              
              
              
              <tr class="justify-content-between">
                <th> <a class="btn_style dark_btn mr-3 d-inline-flex align-items-center" href="<?=base_url();?>"><i class="fas fa-arrow-left mr-2"></i><small>Continue Shopping</small></a></th>
               
                
                <th> <a class="btn_style solid_btn" href="<?=base_url();?>checkout"> <small>Checkout</small></a></th>
                
              </tr>
            </tbody>
          </table>
  


<?php
echo form_close();
}else{
	?>
	<div class="alert alert-warning">Keranjang Belanja Anda Kosong</div>
	<?php
}
?>
          
          
          
          
          
          
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
    
   