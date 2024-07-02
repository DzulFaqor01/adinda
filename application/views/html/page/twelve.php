
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
      
      
      
      <section>
        <div class="container">
          <h2 class="mt-0">Thank You For Your Order</h2>
          <p>Pesanan anda telah diterima, silahkan lakukan pembayaran melalui salah satu rekening kami.</p>
          
          
           
    <?php
if(empty($data))
{
	redirect(base_url());
}
foreach($data as $row){	
}
$total=($row->total+$row->ongkir)-$row->promo;
$s=array(
'penjualan_id'=>$row->penjualan_id,
);
$pembelian=$this->m_db->get_data('penjualan_detail',$s);
?>


	
		
		<div class="card p-4">
            <p class="border-bottom mb-0"><strong class="mr-2">Nomer Invoice :</strong><?=$row->invoice;?></p>
            
            <p class="border-bottom mb-0"><strong class="mr-2">Nama :</strong><?=pelanggan_info('nama_pelanggan');?></p>
            
            <p class="border-bottom mb-0"><strong class="mr-2">Tanggal :</strong><?=date("d-m-Y",strtotime($row->tanggal));?></p>
            
            <p class="border-bottom mb-0"><strong class="mr-2">Alamat :</strong><?=pelanggan_info('alamat');?></p>
            
            
            
            <p class="border-bottom mb-0"><strong class="mr-2">No Hp :</strong><?=pelanggan_info('hp');?></p>
            
            
            <p class="border-bottom mb-0"> <strong class="mr-2">Jenis Pembayaran :</strong>Direct Bank Transfer</p>
            
            
            
            <p class="border-bottom mb-0"> <strong class="mr-2">Status Pembayaran :</strong><?php
		if($row->status=="draft")
		{
			?>
			Belum dibayarkan
			<?php
		}elseif($row->status=="konfirmasi"){
			?>
			Tahap Verifikasi Pembayaran
			<?php
		}elseif($row->status=="lunas"){
			?>
			Packing Item
			<?php
		}elseif($row->status=="shipping"){
			?>
			Telah Dikirim
			<?php
		}
		?></p>
            
            
            
            
		<table class="table table-bordered">
		<thead>
			<th>Nama Produk</th>
			<th width="10%">Jumlah</th>
			<th width="20%">Harga</th>
			<th width="20%">Sub Total</th>
		</thead>
		<tbody>
			<?php
			$i=0;	
			if(!empty($pembelian))
			{
				foreach($pembelian as $item)
				{
					$produkid=$item->produk_id;
					$berat_tmp=produk_info($produkid,'berat');
				?>
				<tr>
					<td>
						<?=produk_info($produkid,'kode_produk');?>-<?=produk_info($produkid,'nama_produk');?><br/>
						Berat : <?=$berat_tmp;?> gram
					</td>
					<td>
						<?=$item->qty;?>
					</td>
					<td>
						Rp <?=number_format($item->harga,0);?>
					</td>
					<td>
						Rp <?=number_format($item->subtotal,0);?>
					</td>			
				</tr>				
				<?php
				}
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"> Sub Total</td>
				<td>
					Rp <?=number_format($row->total,0);?>
				</td>
			</tr>
			
			<tr>
				<td colspan="3"> Ongkir</td>
				<td>
					<?="(".$row->pelayanan.") ".strtoupper($row->kurir);?> Rp <?=number_format($row->ongkir,0);?>
				</td>
			</tr>
			
			<tr>
    <td colspan="3"> Total yang harus dibayarkan</td>
    <td>
       <?php
    $total = $row->total + $row->ongkir;
    echo 'Rp ' . number_format($total, 0, ',', '.');
?>

    </td>
</tr>

			
				


   
</tfoot>
            
            
            
        
          
		
		
		
<?php
$v['total']="Rp ".number_format($total,0);
$this->load->view('html/bankview',$v);
?>
   
       
          
          
          
          
		</table>
            
          
        </div>
        
        </div>
      </section>
    </main>
    
    
    
   