<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$judul;?></title>
    <?=asset_bootstrap_css();?>
  </head>
  <body>
    
	<div class="container">
		<div class="header-laporan" style="border-bottom:3px solid #000;">
			<div class="row">
				<div class="col-md-2">
					<br>
					<img src="<?=base_url();?>assets/kop.png" class="img-responsive" style="width: 100px;"/> <br />
				</div>
				<div class="col-md-10">
					<br>
					<h4>ADINDA THRIFTING </h4>
					Jl. KH. Hasyim Ashari, RT.001/RW.005, Kenanga, Kec. Tangerang, Kota Tangerang, Banten 15145<br/>
					Telp. 082250005356, Email : adinda.thrifting@gmail.com
				</div>
			</div>
		</div>
		<div class="deskripsi-laporan text-center">
			<h4><?=$judul;?></h4>
			<h5><?=$deskripsi;?></h5>
		</div>
		<div class="konten-laporan">
					