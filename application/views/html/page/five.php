





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
      <!-- login section-->
      <section class="login">
        <div class="container">
          <div class="login_form">
            <p class="font-weight-bold">WELCOME BACK</p>
            
            
               <?php
$ref=$this->input->get('ref');
echo validation_errors();
echo form_open(base_url('login').'?ref='.$ref,array('class'=>'form-horizontal'));
?>

              <input class="mb-3 w-100" name="username" type="text" placeholder="User Name" value="<?php echo set_value('username'); ?>"/>
              <input class="mb-1 w-100" name="password" type="password" id="login-pass" placeholder="Password" value="" /><a class="show_pass d-block mb-3 text-right" href="#"> <small>Show Password</small></a>
              
              <div class="text-center">
                <button class="btn_style solid_btn w-100" type="submit">Login</button>
              </div>
        
<?php
echo form_close();
?>

            
<hr class="mb-4 mt-4"/>
            <p class="font-weight-bold">I’M NEW HERE</p><a class="btn_style dark_btn w-100 text-center" href="<?=base_url();?>member/daftar?ref=<?=$ref;?>">Belum punya akun?</a>




            

            
          </div>
        </div>
      </section>
    </main>
 