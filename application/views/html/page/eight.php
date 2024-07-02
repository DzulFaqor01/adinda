
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
      <!-- rejster-->
      
      
      <section class="login">
        <div class="container">
          <div class="login_form">
            <p class="font-weight-bold">WELCOME BACK</p>
            
            
            
            <?php
echo asset_select2();
$ref=$this->input->get('ref');
echo validation_errors();
echo form_open(base_url('member/daftar').'?ref='.$ref,array('class'=>'form-horizontal'));
?>

              <input class="mb-3 w-100" type="text" name="nama" id="" class="form-control " autocomplete="off" placeholder="Nama Lengkap" required="" value="<?php echo set_value('nama'); ?>"/>
              <input class="mb-3 w-100" type="text" name="hp" id="" class="form-control " autocomplete="off" placeholder="Nomor Handphone" required="" value="<?php echo set_value('hp'); ?>"/>
              <textarea class="mb-3 w-100" name="alamat" required="" class="form-control" placeholder="Alamat Pengiriman, kota, provinsi, kodepos"><?=set_value('alamat');?></textarea>
              
         
    	
              
    	   <input class="mb-3 w-100" type="email" name="email" id="" class="form-control " autocomplete="off" placeholder="Email Anda" required="" value="<?php echo set_value('email'); ?>"/>
              <input class="mb-3 w-100" name="username" id="" class="form-control " autocomplete="off" placeholder="Username" required="" value="<?php echo set_value('username'); ?>"/>
              <input class="mb-3 w-100" type="password" name="password" id="" class="form-control " autocomplete="off" placeholder="Password" required="" value="<?php echo set_value('password'); ?>"/>
              <div class="text-center">
                <button class="btn_style solid_btn w-100" type="submit">Daftar</button>
              </div>
       
    
	
<?php
echo form_close();
?>
            
            
            
            
            
            
            <hr class="mb-4 mt-4"/>
            <p class="font-weight-bold">Already have an account</p><a class="btn_style dark_btn w-100 text-center" href="<?=base_url();?>member/login?ref=<?=$ref;?>">Sudah punya akun?</a>
            
          </div>
        </div>
      </section>
    </main>
 

 