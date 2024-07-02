<table class="table">

<tr>
<p class="h4">
    Selamat !! Invoice anda telah diterbitkan. Silahkan melanjutkan pembayaran dengan total <b><?=$total;?></b> ke salah satu pilihan bank di bawah ini, Lalu silahkan konfirmasi pembayaran <a href="<?=base_url();?>konfirmasi" style="color:red;"> <strong>di sini</strong></a>
</p>
</tr>
<tr>
<?php
$dBank = $this->m_db->get_data('bank');
if(!empty($dBank))
{
    $counter = 0;
    echo '<tr>';
    foreach($dBank as $rBank)
    {
        if($counter > 0 && $counter % 2 == 0) {
            echo '</tr><tr>'; 
            }
        $logo = base_url().'assets/images/bank/'.$rBank->logo;
    ?>  
        <td style="text-align: center;">
            <img src="<?=$logo;?>" style="width:350px; height:100px; display: block; margin: 0 auto;"/><br/>
            <strong><?=$rBank->nama_bank;?></strong><br/>
            <strong><?=$rBank->no_rek;?></strong><br/>
            <strong><?=$rBank->pemilik;?></strong><br/>
        </td>
    <?php
        $counter++;
    }
    if($counter % 2 != 0) {
        echo '<td style="text-align: center;"></td>';
    }
    echo '</tr>';
}
?>
</tr>

</table>
