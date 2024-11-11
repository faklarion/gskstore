<html>

<?php include 'header_ip.php' ?>

<body style="background-color: #ffffff;">
    <section>
        <div class="container my-3 justify-content-center">
            <div>
                <h2 class="text-center" style="font-family: 'Poppins', sans-serif;">
                    <b>Tukar Tambah HP Kamu</b>
                </h2>
            </div>
           
            <div>
                <div class="row justify-content-center">
                    <?php foreach ($merk as $row): ?>
                        <div class="col-6 col-sm-3 mt-4 d-none d-sm-block">
                            <a href="<?= site_url($row->link_tt) ?>">
                                <div class="card text-alignment class"
                                    style="background-color: #f0f0f0; border-radius: 12px; height:150px;">
                                    <div class="card-body align-items-center d-flex justify-content-center">
                                        <img src="<?= base_url('assets/img/' . $row->image . '') ?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!--  Tampilan Untuk di Mobile-->
            <div class="container overflow-auto">

            <div class="row flex-nowrap">
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Apple.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/oppo/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Oppo.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/vivo/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Vivo.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/realme/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Realme.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
            </div>
            <div class="row flex-nowrap">
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/samsung/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Samsung.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/infinix/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Infinix.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url('tukar_tambah_android/xiaomi/') ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/Xiaomi.png') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
            </div>
            <!-- END -->
            </div>
                    
            <!-- <p class="text-center" style="font-family: 'Poppins', sans-serif;">
                Harga yang tertera adalah harga estimasi Handphone mulus like new
                <br> jika ada minus fungsi atau minus fisik harga akan berubah sesuai kerusakan.
            </p>   -->          
        </div>
    </section>
</body>

<?php include 'footer.php'; ?>

</html>
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            width: '100%',
            allowClear: true,
            placeholder: '<i class="fa fa-search"></i> Cari HP yang kamu jual..',
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
</script>