<html>

<?php include 'header_ip.php' ?>

<body style="background-color: #ffffff;">
    <section>
        <div class="container my-3 justify-content-center">
            <div>
                <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
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
            
            <div class="container overflow-auto">
            <div class="row flex-nowrap">
                    <?php foreach ($merk_tt as $row): ?>
                    <div class="col-4 mt-4 d-block d-sm-none">
                                    <a href="<?= site_url($row->link_tt) ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/' . $row->image . '') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <?php endforeach; ?>
            </div>
            <div class="row flex-nowrap">
                    <?php foreach ($merk_tt_2 as $row): ?>
                    <div class="col-4 mt-2 d-block d-sm-none">
                                    <a href="<?= site_url($row->link_tt) ?>">
                                        <div class="card justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 12px; height:100px; width:100px;">
                                                <img src="<?= base_url('assets/img/' . $row->image . '') ?>" width="90%">
                                        </div>
                                    </a>
                    </div>
                    <?php endforeach; ?>
            </div>
            </div>
                    
            <!-- <p class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
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