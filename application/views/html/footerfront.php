    <!-- start footer-->
<footer class="site_footer" style="background:url('<?= base_url(); ?>assets/front/image/background_merah.png')">
      <div class="container">
        <div class="row">
          
          <div class="col-sm-6 col-lg-3">
            <h3>Produk</h3>
            <nav class="footer_menu">
              <ul>
                  <?php
		            	$dKat=produk_kategori();
		            	if(!empty($dKat))
		            	{
							foreach($dKat as $rKat)
							{
								$slugCat=string_create_slug($rKat->nama_kategori);
								$urlcat=base_url().'produk/kategori/'.$rKat->kategori_id.'/'.$slugCat;
							?>
							<li> <a class="footer_link" href="<?=$urlcat;?>"><?=$rKat->nama_kategori;?></a></li>
							<?php
							}
						}
		            	?>
                
              </ul>
            </nav>
          </div>
          <div class="col-sm-6 col-lg-3">
            <h3>Information</h3>
            <nav class="footer_menu">
              <ul>
                  
                  <?php
							$dHalaman=$this->m_db->get_data('berita',array('jenis'=>'halaman'));
							if(!empty($dHalaman))
							{
								foreach($dHalaman as $rHalaman)
								{
									$urlpage=base_url().'informasi/'.$rHalaman->slug;
								?>
								<li> <a class="footer_link" href="<?=$urlpage;?>"><?=$rHalaman->judul;?></a></li>
								<?php
								}
							}
							?>
                
              </ul>
            </nav>
          </div>
          <div class="col-sm-6 col-lg-3">
            <h3>Company</h3>
            <nav class="footer_menu">
              <ul>
                  
                  
                <li> <a class="footer_link" href="#"><?=baca_konfig('company-name');?></a></li>
                <li><a class="footer_link" href="#"><?=baca_konfig('company-phone');?></a></li>
                <li> <a class="footer_link" href="#"><?=baca_konfig('company-email');?></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- copy rights-->
      <div class="bottom_footer">
        <div class="container">
          <div class="row justify-content-between"><small>© <a class="text-white">ADINDA THRIFTING</a>, 2024. All Rights Reserved.</small>
            <!-- social links-->
            <ul class="social_footer">
              <li><a class="social-link"><i class="fab fa-facebook-f"></i></a></li>
              <li><a class="social-link"> <i class="fab fa-instagram"></i></a></li>
              <li><a class="social-link"><i class="fab fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
     
    </footer>
    <!-- scripts -->
    <script src="<?=base_url();?>assets/front/js/jquery-plugins.js"></script>
    <script src="<?=base_url();?>assets/front/js/scripts.js"></script>
  </body>
