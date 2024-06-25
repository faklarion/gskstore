<html>

<?php include 'header_ip.php';?>

<body style="background-color: #ffffff;">

    <section>
            <div class="container my-3">
                <h3 class="text-center" style="font-family: Arial, Helvetica, sans-serif;"><b>Cek Harga Tukar Tambah
                        Handphone <?php echo $merk?> Kamu Disini </b></h3>
            </div>
            <div class="container" width="50%">
                <b><a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                        href="<?php echo site_url('tukar_tambah_android/') ?>">Halaman Utama </a></b><i
                    class="fa fa-chevron-right text-muted"></i> <b class="text-muted"
                    style="font-family: Arial, Helvetica, sans-serif;"><?php echo $merk; ?></b>
            </div>
            <!-- <form action="<?php echo site_url('tukar_tambah_android/tt_action') ?>" method="get" enctype="multipart/form-data"
                autocomplete="off">
                <div class="custom-search my-3">
                    <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                        <option value="">Cari Harga handphone yang ingin kamu jual </option>
                        <?php foreach ($tipe as $dataTipe): ?>
                            <option value="<?= $dataTipe->id_harga ?>" >
                                <?= $dataTipe->nama_tipe ?> / <?= $dataTipe->nama_memori ?>
                            </option>
                        <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <div class="container">
                    <input type="hidden" name="id_merk" value="<?php echo $idMerk ?>"/>
                    <input type="hidden" name="nama_merk" value="<?php echo $merk ?>"/>
                    <p class="text-center"><span class="text-center">Tukar Dengan</span></p>
                </div>
                <div class="custom-search">
                    <select name="id_baru" class="js-example-basic-single" id="id_baru" required>
                        <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                        <?php foreach ($tipe_baru as $dataTipe): ?>
                            <option value="<?= $dataTipe->id_baru ?>"><?= $dataTipe->nama_baru ?> <?= $dataTipe->memori_baru ?> </option>
                        <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <br>
                <div class="container">
                    <p class="text-center"><button type="submit" class="btn btn-warning"
                            style="border-radius:10px; width: 300px;">
                            <b style="font-family: Arial, Helvetica, sans-serif;">Lanjutkan</b>
                        </button></p>
                </div>
            </form> -->
            <form action="<?php echo site_url('tukar_tambah_android/tt_action') ?>" method="get" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id_merk" value="<?php echo $idMerk ?>"/>
            <input type="hidden" name="nama_merk" value="<?php echo $merk ?>"/>
            <div class="container my-2">
                <div class="row">
                    <div class="col-6 p-1">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $merk ?></h5>
                                <p class="text-center">
                                    <img id="displayImageBekas" src="<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                                <option value="">Cari Harga handphone yang ingin kamu jual </option>
                                <?php foreach ($tipe as $dataTipe): ?>
                                    <option value="<?= $dataTipe->id_harga ?>" >
                                        <?= $dataTipe->nama_tipe ?> / <?= $dataTipe->nama_memori ?>
                                    </option>
                                <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-1">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $merk ?></h5>
                                <p class="text-center">
                                    <img id="displayImage" src="<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            
                            <select name="id_baru" class="js-example-basic-single" id="id_baru" required>
                                <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                                <?php foreach ($tipe_baru as $dataTipe): ?>
                                    <option value="<?= $dataTipe->id_baru ?>"><?= $dataTipe->nama_baru ?> <?= $dataTipe->memori_baru ?> </option>
                                <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="container">
                    <p class="text-center"><button type="submit" class="btn btn-warning"
                            style="border-radius:10px; width: 300px;">
                            <b style="font-family: Arial, Helvetica, sans-serif;">CEK SEKARANG</b>
                        </button></p>
                    </div>
                </div>
            </div>
            </form> 
            
            <!--<div class="custom-search">
                <input class="custom-search-input" placeholder="Cek harga HP yang kamu jual disini..." type="text"
                        id="country" autocomplete="off" name="country" class="form-control">
                <button class="custom-search-botton" type="submit"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
            </div> -->
            <!--<ul class="dropdown-menu txtcountry" role="menu" aria-labelledby="dropdownMenu" id="DropdownCountry"></ul>-->
            <div class="container">
                    <p class="text-center" style="font-family: Arial, Helvetica, sans-serif;">Harga yang tertera adalah harga estimasi tukar tambah dan bisa berubah sewaktu waktu.
                    <br>Hubungi call center sekarang sebelum harga berubah.</p>
                    <p class="text-center"><a target="_blank" href="https://wa.me/628115546464" class="btn btn-sm btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i> HUBUNGI CALL CENTER</a></p>
            </div>
        </div>
    </section>

</body>

<?php include 'footer.php'; ?>

</html>
<script>
    $(document).ready(function () {
        $('#id_tipe').select2({
            width: '100%',
            allowClear: true,
            placeholder: '<i class="fa fa-search"></i> <small>HP di jual..</small>',
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#id_baru').select2({
            width: '100%',
            allowClear: true,
            placeholder: '<i class="fa fa-search"></i> <small>HP di beli..</small>',
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
</script>
<script>
        $(document).ready(function () {
            $('#id_baru').change(function () {
                var id_baru = $(this).val();
                console.log('Selected ID:', id_baru); // Debug log
                $.ajax({
                    url: '<?php echo site_url("tukar_tambah/get_image_url"); ?>',
                    method: 'POST',
                    data: { id_baru: id_baru },
                    success: function (response) {
                        console.log('AJAX Response:', response); // Debug log
                        try {
                            var data = JSON.parse(response);
                            var imagePath = data.gambar_baru ? '<?php echo base_url("assets/hpbaru/"); ?>' + data.gambar_baru : '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';
                            console.log('Constructed Image Path:', imagePath); // Debug log
                            $('#displayImage').attr('src', imagePath); // Update image source
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#displayImage').attr('src', '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>');
                    }
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath = $('#id_baru option:selected').data('gambar_baru') ? '<?php echo base_url(); ?>' + $('#id_baru option:selected').data('gambar_baru') : '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';
            console.log('Initial Image Path:', initialImagePath); // Debug log
            $('#displayImage').attr('src', initialImagePath); // Set initial image
        });
    </script>