<main class="site_main">
    <!-- top section-->
    <section class="top_sec text-white" style="background:url('<?= base_url(); ?>assets/front/image/slider1.jpg'); width:100%;">
        <div class="container text-white">
            <h2 class="section_tit margin_bottom text-white"><span><?=$judulhalaman;?></span></h2>
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
                <p class="font-weight-bold">Silahkan masukkan nomor invoice anda</p>
                
                <?php
                echo asset_jqueryui();
                echo validation_errors();
                echo form_open_multipart(base_url('konfirmasi'), array('class' => 'form-horizontal'));
                ?>
                <label class="mb-3 w-100" for="invoice">No. Invoice</label>
                <div class="input-group mb-3 w-100">
                    <input type="text" id="invoice" name="invoice" class="form-control" placeholder="Nomor Invoice" required="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="getinvoice();"><i class="fa fa-plus"></i></button>
                    </span>
                </div>
                <label class="mb-1 w-100" for="total">Total</label>
                <p class="form-control mb-3 w-100"  id="total">Rp 0</p>
                <input type="hidden" name="total" id="htotal" />
                <label class="mb-3 w-100" for="bankid">Ditransfer ke</label>
                <select name="bankid" class="form-control" required="">
                    <?php
                    $dBank = $this->m_db->get_data('bank');
                    if (!empty($dBank)) {
                        foreach ($dBank as $rBank) {
                            $nama = $rBank->nama_bank;
                            $pemilik = $rBank->pemilik;
                            $norek = $rBank->no_rek;
                            $lbl = $nama . "-" . $norek . " (" . $pemilik . ")";
                            echo '<option value="' . $rBank->bank_id . '">' . $lbl . '</option>';
                        }
                    }
                    ?>
                </select>
                
                <label class="mb-3 w-100" for="pemilik">Nama Pengirim</label>
                <input type="text" name="pemilik" id="pemilik" class="form-control mb-3 w-100" autocomplete="off" placeholder="Nama Pengirim Dana" required="" value="<?php echo set_value('pemilik'); ?>" />
                
                <label class="mb-3 w-100" for="tanggal">Tanggal Transfer</label>
                <input type="text" name="tanggal" id="" class="form-control tanggal mb-3 w-100" autocomplete="off" placeholder="Tanggal Transfer" required="" value="<?php echo set_value('tanggal', date("Y-m-d")); ?>" />
                
                <label class="mb-3 w-100" for="bukti">Bukti Transfer</label>
                <input type="file" name="bukti" id="bukti" class="form-control mb-3 w-100" autocomplete="off" placeholder="Upload Bukti Transfer" required/>
                
                <div class="text-center">
                    <button class="btn_style solid_btn w-100" id="submitBtn" type="submit" disabled>Konfirmasi</button>
                </div>
                
                <?php
                echo form_close();
                ?>
                
                <script>
                $(document).ready(function(){
                    $('#bukti').on('change', function(){
                        if ($(this).val()) {
                            $('#submitBtn').removeAttr('disabled');
                        } else {
                            $('#submitBtn').attr('disabled', 'disabled');
                        }
                    });
                });

                function getinvoice() {
                    var iv = $("#invoice").val();
                    if (iv == "") {
                        return;
                    }
                    $.ajax({
                        method: "get",
                        dataType: "json",
                        url: "<?=base_url();?>pembayaran/getinvoice",
                        data: "invoice=" + iv,
                        beforeSend: function() {
                            $("form input").attr("disabled", "disabled");
                            $("form button").attr("disabled", "disabled");
                            $("#htotal").val(0);
                            $("#total").html("Rp 0");
                            $("#pemilik").val("");
                        }
                    })
                    .done(function(x) {
                        if (x.status == "ok") {
                            $("#total").html(x.total);
                            $("#pemilik").val(x.nama);
                            $("#htotal").val(x.total2);
                        } else {
                            $("#total").html("Rp 0");
                            $("#pemilik").val("");
                            $("#htotal").val(0);
                        }
                        $("form input").removeAttr("disabled");
                        $("form button").removeAttr("disabled");
                    })
                    .fail(function() {
                        $("form input").removeAttr("disabled");
                        $("form button").removeAttr("disabled");
                        $("#htotal").val(0);
                        $("#total").html("Rp 0");
                        $("#pemilik").val("");
                    });
                }
                </script>
                
            </div>
        </div>
    </section>
</main>
