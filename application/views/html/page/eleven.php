

  
  
  
  
    <main class="site_main">
      <!-- top section-->
     <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container text-white" >
          <h2 class="section_tit margin_bottom text-white"><span><?=$judulhalaman;?></span></h2>
          <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item text-white"><a class="text-white" href="#"><?=$judulhalaman;?></a></li>
            </ol>
          </nav>
        </div>
      </section>
      <!-- my bag section-->

    
    <?php
echo asset_select2();
if (akses() != "member") {
    redirect(base_url());
}
$berat = 0;
$pembelian = $this->cart->contents();

if (!empty($pembelian)) {
?>

<?php
echo validation_errors();
echo form_open(base_url('produk/selesai'), array('id' => 'myForm', 'class' => 'form-horizontal'));
?>

<input type="hidden" name="pelangganid" value="<?= pelanggan_info('pelanggan_id'); ?>" />


      <section class="mybag">
        <div class="container">
          <div class="checkout">
            <div class="row">
              <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                      <h3 class="yellow_text _bold mt-0">Address</h3>
                      <hr/>
                      <div class="input-row">
                        <div class="_icon"><img src="<?=base_url();?>assets/images/icon/user.png" alt="pic"/></div>
                        <input class="w-100" type="text" id="fname" name="firstname" placeholder="First Name" value="<?= pelanggan_info('nama_pelanggan'); ?>"/>
                      </div>
                      <div class="input-row">
                        <div class="_icon"><img src="<?=base_url();?>assets/images/icon/email.png" alt="pic"/></div>
                        <input class="w-100" type="email" id="email" name="email" placeholder="john@example.com" value="<?= pelanggan_info('email'); ?>"/>
                      </div>
                      
                      <div class="input-row">
                        <div class="_icon"><img src="<?=base_url();?>assets/images/icon/hp.png" alt="pic"/></div>
                        <input class="w-100" type="text" id="hp" name="hp" placeholder="No Hp" value="<?= pelanggan_info('hp'); ?>"/>
                      </div>
                      <div class="input-row">
                        <div class="_icon"><img src="<?=base_url();?>assets/images/icon/alamat.png" alt="pic"/></div>
                        <input class="w-100" type="text" id="adr" name="address" placeholder="Address" value="<?= pelanggan_info('alamat'); ?>"/>
                      </div>
                      
                    
                      
                      
                      
                      
                    </div>
                    <div class="col-sm-12 col-lg-6">
                      <h3 class="yellow_text _bold mt-0">Jenis Pengiriman</h3>
                      <hr/>
                      
                     
                      
                      <div class="input-row">
                        
                        <?php
        $kurir = array('jne', 'pos', 'tiki');
        foreach ($kurir as $rkurir) {
            ?>
           
                <input type="radio" name="kurir" class="kurir" value="<?= $rkurir; ?>" required/> <?= strtoupper($rkurir); ?>
         
            <?php
        }
        ?>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  <h3 id="totalbayar"></h3>
        <button class="btn_style solid_btn w-100" type="submit" id="oksimpan"> Pembayaran</button>
        
        
                
                
                
              </div>
              <div class="col-lg-5">
                <div>
                  <div class="modal-dialog mt-4 pt-3" role="document">
                    <div class="modal-content">
                      <div class="modal-body pl-4 pr-4">
                        <div class="d-flex justify-content-between align-items-center"><strong>Ongkos Kirim</strong>
                          <p>Rp. 50.0000</p>
                        </div>
                        <hr/>
                        <div class="d-flex justify-content-between align-items-center pt-3 mb-3"><strong class="text-danger">Sub Total Produk  </strong><strong>Rp <?= number_format($this->cart->total(), 0); ?></strong></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      








<div style="display:none;">
   
   
    <?php
    $i = 0;
    if (!empty($pembelian)) {
        foreach ($pembelian as $item) {
            $i += 1;
            $id = $item['rowid'];
            $berat_tmp = field_value('produk', 'kode_produk', $item['id'], 'berat');
            $produk_id = field_value('produk', 'kode_produk', $item['id'], 'produk_id');
            $berat += $berat_tmp;
            $produkid = $item['produk_id'];
            $harga = produk_info($produkid, 'harga');
            ?>
            <div class="product-item">
                <p>Nama Produk: <?= $item['id']; ?>-<?= $item['name']; ?></p>
                <p>Berat: <?= $berat_tmp; ?> gram</p>
                <p>Keterangan: <?= $item['keterangan']; ?></p>
                <p>Jumlah: <?= $item['qty']; ?></p>
                <p>Harga: Rp <?= number_format($harga, 0); ?></p>
                <p>Diskon: Rp 0</p>
                <p>Sub Total: Rp <?= number_format($item['subtotal'], 0); ?></p>
            </div>
            <input type="hidden" name="produk[<?= $i; ?>][produkid]" value="<?= $produk_id; ?>" />
            <input type="hidden" name="produk[<?= $i; ?>][qty]" value="<?= $item['qty']; ?>" />
            <input type="hidden" name="produk[<?= $i; ?>][harga]" value="<?= $item['price']; ?>" />
            <input type="hidden" name="produk[<?= $i; ?>][keterangan]" value="<?= $item['keterangan']; ?>" />
            <input type="hidden" name="produk[<?= $i; ?>][subtotal]" value="<?= $item['subtotal']; ?>" />
            <?php
        }
    }
    ?>
</div>
<div id="kuririnfo" style="display: none;">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="">Service</label>
        <div class="col-md-10">
            <p class="form-control-static" id="kurirserviceinfo"></p>
        </div>
    </div>
</div>
<input type="hidden" name="total" id="total" value="<?= $this->cart->total(); ?>" />
<input type="hidden" name="ongkir" id="ongkir" value="50000" />
<input type="hidden" name="berat" value="<?= $berat; ?>" />
<input type="hidden" name="diskonnilai" id="diskonnilai" value="0" />
<input type="hidden" name="service" id="service" value="standard" />

<?php
echo form_close();
?>


   
 <script>
$(document).ready(function() {
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var kurirSelected = false;
        var kurirRadios = document.getElementsByClassName('kurir');
        for (var i = 0; i < kurirRadios.length; i++) {
            if (kurirRadios[i].checked) {
                kurirSelected = true;
                break;
            }
        }
        if (!kurirSelected) {
            alert('Harap pilih kurir sebelum melanjutkan!');
            event.preventDefault(); // Prevent form submission
        }
    });
});
</script>


<script>
$(document).ready(function() {
    $(".kurir").each(function(o_index, o_val) {
        $(this).on("change", function() {
            var did = $(this).val();
            var berat = "<?= $berat; ?>";
            var kota = "sama";
            
            console.log("Kurir dipilih: " + did);
            console.log("Berat: " + berat);
            console.log("Kota: " + kota);

            // Set ongkir secara otomatis
            var ongkir = 50000;  // Tetapkan biaya ongkir tetap 50,000
            $("#ongkir").val(ongkir);
            $("#kurirserviceinfo").html("Biaya Ongkir: Rp " + toDuit(ongkir));
            $("#kuririnfo").show();
            $("#service").val("standard"); // Set service value
            hitung();
        });
    });

    hitung();
});

function hitung() {
    var total = $('#total').val();
    var ongkir = $("#ongkir").val();
    var bayar = (parseFloat(total) + parseFloat(ongkir));
    if (parseFloat(ongkir) > 0) {
        $("#oksimpan").show();
    } else {
        $("#oksimpan").hide();
    }
    $("#totalbayar").html(toDuit(bayar));
}

function toDuit(angka) {
    return angka.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
}
</script>

<?php
} else {
    redirect(base_url().'keranjang');
}
?>

    

      
      
      
    </main>
    
 


    
    
    
  