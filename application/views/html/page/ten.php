

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
      <section>
        <div class="container">
          <h2 class="mt-0"><?=$judulhalaman;?></h2>
          <?php
if(!empty($data))
{
	foreach($data as $row){		
	}
	?>	
	<p><?=$row->isi;?></p>
	<?php
}
?>
          
        </div>
      </section>
    </main>
   