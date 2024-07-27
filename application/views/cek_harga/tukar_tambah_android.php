<!DOCTYPE html>
<html>
<?php include 'header_ip.php';?>

<body style="background-color: #ffffff;">
    <section>
        <div class="container my-3">
            <h3 class="text-center" style="font-family: Arial, Helvetica, sans-serif;"><b>Cek Harga Tukar Tambah
                    Handphone <?php echo $merk ?> Kamu Disini </b></h3>
        </div>
        <div class="container" width="50%">
            <b><a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                    href="<?php echo site_url('tukar_tambah_android/') ?>">Halaman Utama </a></b><i
                class="fa fa-chevron-right text-muted"></i> <b class="text-muted"
                style="font-family: Arial, Helvetica, sans-serif;"><?php echo $merk ?></b>
        </div>

        <form action="<?php echo site_url('tukar_tambah_android/tt_action') ?>" method="get" enctype="multipart/form-data"
            autocomplete="off">
            <input type="hidden" name="id_merk" value="<?php echo $idMerk ?>">
            <input type="hidden" name="nama_merk" value="<?php echo $merk ?>">
            <div class="container my-2">
                <div class="row">
                    <div class="col-6 p-1">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $merk ?></h5>
                                <p class="text-center">
                                    <img id="displayImageBekas" src="<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            
                            <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                                <option value="">Cari Harga handphone yang ingin kamu jual </option>
                                <?php foreach ($tipe as $dataTipe): ?>
                                    <option value="<?= $dataTipe->id_harga ?>" data-gambar_tipe="<?= $dataTipe->gambar_tipe ?>">
                                        <small>
                                            <?= $dataTipe->nama_merk ?> <?= $dataTipe->nama_tipe ?> / <?= $dataTipe->nama_memori ?>
                                        </small>
                                    </option>
                                <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-1">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title text-center" id="dynamicLabel"><?php echo $merk?></h5>
                                <p class="text-center">
                                    <img id="displayImage" src="<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>" alt="Selected Image">
                                </p>
                            </div>
                            
                            <div class="select-container">
                                <select name="nama_baru" class="js-example-basic-single" id="nama_baru" required>
                                    <option value="">Pilih Nama Baru</option>
                                    <?php foreach ($nama_brand as $dataTipe): ?>
                                        <option value="<?= $dataTipe->nama_merk_baru ?>">
                                            <small><?= $dataTipe->nama_merk_baru ?></small>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <select name="id_baru" class="js-example-basic-single" id="id_baru" required>
                                    <option value="">Pilih ID Baru</option>
                                </select>
                            </div>
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

        <div class="container">
            <p class="text-center" style="font-family: Arial, Helvetica, sans-serif;">Harga yang tertera adalah harga
                estimasi tukar tambah dan bisa berubah sewaktu waktu.<br>Hubungi call center sekarang sebelum harga
                berubah.</p>
            <p class="text-center"><a target="_blank" href="https://wa.me/628115546464"
                    class="btn btn-sm btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i> HUBUNGI CALL
                    CENTER</a></p>
        </div>
    </section>

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

            $('#id_baru').select2({
                width: '100%',
                allowClear: true,
                placeholder: '<i class="fa fa-search"></i> <small>HP di beli..</small>',
                escapeMarkup: function (markup) {
                    return markup;
                }
            });

            $('#nama_baru').select2({
                width: '100%',
                allowClear: true,
                placeholder: '<i class="fa fa-search"></i> <small>Merk HP..</small>',
                escapeMarkup: function (markup) {
                    return markup;
                }
            });

            // For the first dropdown (id_tipe)
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
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#displayImageBekas').attr('src', '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>');
                    }
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath = $('#id_tipe option:selected').data('gambar_tipe') ? '<?php echo base_url(); ?>' + $('#id_tipe option:selected').data('gambar_tipe') : '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>';
            console.log('Initial Image Path:', initialImagePath); // Debug log
            $('#displayImageBekas').attr('src', initialImagePath); // Set initial image

            // For the second dropdown (id_baru)
            $('#id_baru').change(function () {
                var id_baru = $(this).val();
                var selectedOptionText = $(this).find('option:selected').text();
                const words = selectedOptionText.trim().split(' '); // Split into an array of words
                const firstWord = words[0];
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
                            $('#dynamicLabel').text(firstWord); // Update label text
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#displayImage').attr('src', '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>');
                        $('#dynamicLabel').text('Apple'); // Reset to default label
                    }
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath2 = $('#id_baru option:selected').data('gambar_baru') ? '<?php echo base_url(); ?>' + $('#id_baru option:selected').data('gambar_baru') : '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';
            var initialLabelText = $('#id_baru option:selected').text().split(' ')[0];
            console.log('Initial Image Path:', initialImagePath2); // Debug log
            $('#displayImage').attr('src', initialImagePath2); // Set initial image
            $('#dynamicLabel').text(initialLabelText); // Set initial label
        });
    </script>
    <script>
        $(document).ready(function() {
            // Kosongkan opsi di id_baru pada saat halaman dimuat
            $('#id_baru').empty();
            $('#id_baru').append('<option value="">Pilih ID Baru</option>');
            
            $('#nama_baru').change(function() {
                var selectedNamaBaru = $(this).val().toLowerCase();

                // Kosongkan opsi di id_baru
                $('#id_baru').empty();
                
                // Tambahkan kembali opsi default
                $('#id_baru').append('<option value="">Pilih ID Baru</option>');

                <?php foreach ($all_brand as $dataTipe): ?>
                var nama_baru = '<?= strtolower($dataTipe->nama_baru) ?>';
                if (nama_baru.includes(selectedNamaBaru)) {
                    $('#id_baru').append('<option value="<?= $dataTipe->id_baru ?>" data-gambar_baru="<?= $dataTipe->gambar_baru ?>"><?= $dataTipe->nama_baru ?></option>');
                }
                <?php endforeach; ?>
            });
        });
    </script>
</body>

<?php include 'footer.php'; ?>

</html>
