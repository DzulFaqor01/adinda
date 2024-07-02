
    <main class="site_main">
      <!-- top section-->
      <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container">
          <h2 class="section_tit margin_bottom"><span>Profile</span></h2>
          <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb text-white">
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item text-white"><a class="text-white" href="#">Profile</a></li>
            </ol>
          </nav>
        </div>
      </section>
      <!-- rejster-->
      
      
      <section class="login">
        <div class="container">
          <div class="login_form">
            <p class="font-weight-bold">WELCOME....</p>
            
            
            
            <?php
echo asset_select2();
$ref=$this->input->get('ref');
echo validation_errors();
echo form_open(base_url('akun').'?ref='.$ref,array('class'=>'form-horizontal'));
?>






              <input class="mb-3 w-100" type="text" name="nama" id="" class="form-control " autocomplete="off" placeholder="Nama Lengkap" required="" value="<?php echo set_value('nama',pelanggan_info('nama_pelanggan')); ?>"/>
              
              
              <input class="mb-3 w-100" type="text" name="hp" id="" class="form-control " autocomplete="off" placeholder="Nomor Handphone" required="" value="<?php echo set_value('hp',pelanggan_info('hp')); ?>"/>
              
              
    	   <input class="mb-3 w-100" type="email" name="email" id="" class="form-control " autocomplete="off" placeholder="Email Anda" required="" value="<?php echo set_value('email',pelanggan_info('email')); ?>"/>
    	   
              <textarea name="alamat" required="" class="form-control" placeholder="Alamat Pengiriman"><?=set_value('alamat',pelanggan_info('alamat'));?></textarea>
              
              
    	</br>
    	
    	   
    	      <div class="text-center">
                <button class="btn_style solid_btn w-100" type="submit">Update Akun</button>
              </div>
       
    







<?php
echo form_close();
?>
  
  
  
  
            
            
            
            
            
            
            
            
    
            
            
            
            
           
            
          </div>
        </div>
      </section>
    </main>
 

 