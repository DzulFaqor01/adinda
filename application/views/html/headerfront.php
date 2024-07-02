
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>ADINDA THRIFTING</title>
    <!-- Favicons -->
    <link rel="icon" href="https://ah-theme.com/gstore/preview/img/favicon.png" sizes="16x16" type="image/png"/>
    <!-- css plugins-->
    <link href="<?=base_url();?>assets/front/css/inc/plugins.css" rel="stylesheet"/>
    <!-- css stylesheet-->
    <link href="<?=base_url();?>assets/front/css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">              </script>
	
  </head>
  <body>
    <!-- star header-->
    <!-- start header-->
    <header class="site_header animated">
      <!-- main menu-->
      <div class="bottom_header">
        <div class="container">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?=base_url();?>"> ADINDA THRIFTING</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <!-- start menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav m-auto">
                <li class="nav-item"><a class="nav-link" href="<?=base_url();?>produk/kategori/5/jaket">Jaket</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url();?>produk/kategori/8/baju">Baju</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url();?>produk/kategori/7/celana">Celana</a></li>
              </ul>
              <div class="top_social_links">
                <ul class="d-flex justify-content-end">
                  
                  <li><a class="social-link" href="<?=base_url();?>keranjang"><i class="fas fa-shopping-cart"></i><br> <small>My Cart</small></a></li>
                
                
                <?php if(akses() == "member") { ?>
                 <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="kids" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= pelanggan_info('nama_pelanggan'); ?></a>
                  <div class="dropdown-menu animated fadeInUp" aria-labelledby="kids">
    
                    <a class="dropdown-item" href="<?=base_url();?>profil">Profil</a>
                    <a class="dropdown-item" href="<?=base_url();?>keranjang">Keranjang Belanja</a>
                    <a class="dropdown-item" href="<?=base_url();?>konfirmasi">Konfirmasi Pembayaran</a>
                    <a class="dropdown-item" href="<?=base_url();?>akun/histori">Histori Belanja</a>
                    <a class="dropdown-item" href="<?=base_url();?>logout">Log Out</a>
                  </div>
                  
                </li>
                 <?php } else {
                $ref = $this->uri->ruri_string(); ?>
                <li><a class="social-link" href="<?=base_url();?>member/login?ref=<?=$ref;?>"><i class="fas fa-user"> </i><br><small>Login</small></a></li>
                
            <?php } ?>
                
                
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>