<html>

<?php include 'header_ip.php'; ?>

<body style="background-color: #ffffff;">
    <section>
            <div class="container my-3">
                <h3 class="text-center" style="font-family: Arial, Helvetica, sans-serif;"><b>Cek Harga Tukar Tambah Handphone Apple Kamu Disini </b></h3>
            </div>
            <div class="container" width="50%">
                <b><a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                        href="<?php echo site_url('tukar_tambah_android/') ?>">Halaman Utama </a></b><i
                    class="fa fa-chevron-right text-muted"></i> <b class="text-muted"
                    style="font-family: Arial, Helvetica, sans-serif;">Apple</b>
            </div>
            <!-- <form action="<?php echo site_url('tukar_tambah/tt_action') ?>" method="get" enctype="multipart/form-data"
                autocomplete="off">
                <div class="custom-search my-3">
                    <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                        <option value="">Cari Harga handphone yang ingin kamu jual </option>
                        <?php foreach ($tipe as $dataTipe): ?>
                            <option value="<?= $dataTipe->id_harga ?>" <?php if($dataTipe->id_harga==$id_tipe) echo 'selected="selected"'; ?>>
                                <?= $dataTipe->nama_tipe ?> / <?= $dataTipe->nama_memori ?>
                            </option>
                        <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <div class="container">
                    <p class="text-center"><span class="text-center">Tukar Dengan</span></p>
                </div>
                <div class="custom-search">
                    <select name="id_baru" class="js-example-basic-single" id="id_baru" required>
                        <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                        <?php foreach ($tipe_baru as $dataTipe): ?>
                            <option value="<?= $dataTipe->id_baru ?>" <?php if($dataTipe->id_baru==$id_baru) echo 'selected="selected"'; ?>><?= $dataTipe->nama_baru ?> /
                                <?= $dataTipe->memori_baru ?> </option>
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
            <form action="<?php echo site_url('tukar_tambah/tt_action') ?>" method="get" enctype="multipart/form-data" autocomplete="off">
            <div class="container my-2">
                <div class="row">
                    <div class="col-6 p-1">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center">Apple</h5>
                                <p class="text-center">
                                    <img id="displayImageBekas" src="<?php echo base_url("assets/hptipe/$gambarBekas"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            
                            <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                                <option value="">Cari Harga handphone yang ingin kamu jual </option>
                                <?php foreach ($tipe as $dataTipe): ?>
                                    <option value="<?= $dataTipe->id_harga ?>" <?php if($dataTipe->id_harga==$id_tipe) echo 'selected="selected"'; ?>>
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
                                <h5 class="card-title text-center">Apple</h5>
                                <p class="text-center">
                                    <img id="displayImage" src="<?php echo base_url("assets/hpbaru/$gambar"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            <select name="id_baru" class="js-example-basic-single" id="id_baru" required>
                                <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                                <?php foreach ($tipe_baru as $dataTipe): ?>
                                    <option value="<?= $dataTipe->id_baru ?>" <?php if($dataTipe->id_baru==$id_baru) echo 'selected="selected"'; ?>><?= $dataTipe->nama_baru ?> /
                                        <?= $dataTipe->memori_baru ?> </option>
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

           
            <?php 
             $tipe = $this->Tbl_harga_model->get_all_tt_by_id($this->input->get('id_tipe'));
             $baru = $this->Tbl_harga_model->get_all_baru_by_id($this->input->get('id_baru'));
                
                if($tipe) {
                    $hargaTipe =  $tipe->harga;
                }

                if($baru) {
                    $hargaBaru = $baru->harga_baru;
                }
                $hargaTT = $hargaBaru - $hargaTipe;
            ?>
            <div class="container">
                <h4 class="text-center">
                    Harga Estimasi Tukar Tambah Adalah <?= rupiah($hargaTT); ?>
                </h4>
            </div>
            <br>
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
                    <p class="text-center"><a target="_blank" href="https://wa.me/628115546464" class="btn btn-sm btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i> HUBUNGI CALL CENTER</a></p>
            </div>
        </div>
    </section>
</body>

<?php include 'footer.php' ?>

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
            $('#id_tipe').change(function () {
                var id_tipe = $(this).val();
                console.log('Selected ID:', id_tipe); // Debug log
                $.ajax({
                    url: '<?php echo site_url("tukar_tambah/get_image_url_bekas"); ?>',
                    method: 'POST',
                    data: { id_tipe: id_tipe },
                    success: function (response) {
                        console.log('AJAX Response:', response); // Debug log
                        try {
                            var data = JSON.parse(response);
                            var imagePath = data.gambar_tipe ? '<?php echo base_url("assets/hptipe/"); ?>' + data.gambar_tipe : '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>';
                            console.log('Constructed Image Path:', imagePath); // Debug log
                            $('#displayImageBekas').attr('src', imagePath); // Update image source
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath = $('#id_tipe option:selected').data('gambar_tipe') ? '<?php echo base_url(); ?>' + $('#id_tipe option:selected').data('gambar_tipe') : '<?php echo base_url("assets/hptipe/$gambarBekas"); ?>';
            console.log('Initial Image Path:', initialImagePath); // Debug log
            $('#displayImageBekas').attr('src', initialImagePath); // Set initial image
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
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath = $('#id_baru option:selected').data('gambar_baru') ? '<?php echo base_url(); ?>' + $('#id_baru option:selected').data('gambar_baru') : '<?php echo base_url("assets/hpbaru/$gambar"); ?>';
            console.log('Initial Image Path:', initialImagePath); // Debug log
            $('#displayImage').attr('src', initialImagePath); // Set initial image
        });
    </script>