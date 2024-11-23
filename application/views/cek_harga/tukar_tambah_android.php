<!DOCTYPE html>
<html>
<?php include 'header_ip.php';?>
<script>
        $(document).ready(function() {
            // Initially hide both forms
            $('#ttbaru').show();
            $('#ttsecond').hide();

            // Show the selected form based on dropdown selection
            $('#formSelect').change(function() {
                var selectedForm = $(this).val();
                if (selectedForm === 'form1') {
                    $('#ttbaru').show();
                    $('#ttsecond').hide();
                } else if (selectedForm === 'form2') {
                    $('#ttbaru').hide();
                    $('#ttsecond').show();
                } else {
                    $('#ttbaru').hide();
                    $('#ttsecond').hide();
                }
            });
        });
</script>
<body style="background-color: #ffffff;">      
        <div class="container my-3">
            <h3 class="text-center" style="font-family: 'Poppins', sans-serif;"><b>Cek Harga Tukar Tambah Handphone <?php echo $merk ?> Kamu Disini </b></h3>
        </div>
        <div class="container" width="50%">
            <b><a class="text-muted hover-overlay" style="font-family: 'Poppins', sans-serif;" href="<?php echo site_url('tukar_tambah_android/') ?>">Halaman Utama </a></b><i
                class="fa fa-chevron-right text-muted"></i> <b class="text-muted"
                style="font-family: 'Poppins', sans-serif;"><?php echo $merk ?></b>
        </div>
        
        <!-- Dropdown untuk memilih formulir -->
        <div class="container my-2">
            <h6>Pilih jenis tukar tambah kamu : </h6>
            <select id="formSelect" style="margin-bottom: 20px;" class="form-control">
                <option value="form1" selected>Tukar Tambah ke HP Baru</option>
                <option value="form2">Tukar Tambah ke HP Second</option>
            </select>
        </div>
        <!-- Dropdown untuk memilih formulir -->
        
        <!-- Second ke Baru -->
        <section>
            <form action="<?php echo site_url('tukar_tambah_android/tt_action') ?>" method="get" enctype="multipart/form-data" autocomplete="off" id="ttbaru">
                <input type="hidden" name="id_merk" value="<?php echo $idMerk ?>">
                <input type="hidden" name="nama_merk" value="<?php echo $merk ?>">
                <div class="container my-2">
                    <div class="row">
                        <div class="col-6 p-1">
                            <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Lama Kamu
                                    </h6>
                                    <h5 class="card-title text-center mt-2"><?= $merk ?></h5>
                                    <p class="text-center">
                                        <img id="displayImageBekas" src="<?php echo base_url('assets/hpbaru/ilustrasihp.jpg'); ?>" alt="Selected Image">
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
                            <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Yang Kamu Mau
                                    </h6>
                                    <h5 class="card-title text-center mt-2" id="dynamicLabel"><?= $merk ?></h5>
                                    <p class="text-center">
                                        <img id="displayImage" src="<?php echo base_url('assets/hpbaru/ilustrasihp.jpg'); ?>" alt="Selected Image">
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
                                    <b style="font-family: 'Poppins', sans-serif;">CEK SEKARANG</b>
                                </button></p>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- END Second ke Baru -->

        <!-- Second ke Second -->
        <section>
            <form action="<?php echo site_url('tukar_tambah_android/tt_action_second') ?>" method="get" enctype="multipart/form-data" autocomplete="off" id="ttsecond">
                <input type="hidden" name="id_merk" value="<?php echo $idMerk ?>">
                <input type="hidden" name="nama_merk" value="<?php echo $merk ?>">
                <div class="container my-2">
                    <div class="row">
                        <div class="col-6 p-1">
                            <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Lama Kamu
                                    </h6>
                                    <h5 class="card-title text-center mt-2"><?= $merk ?></h5>
                                    <p class="text-center">
                                        <img id="displayImageBekasSecond" src="<?php echo base_url('assets/hpbaru/ilustrasihp.jpg'); ?>" alt="Selected Image">
                                    </p>
                                </div>
                                
                                <select name="id_tipe_second" class="js-example-basic-single" id="id_tipe_second" required>
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
                            <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Yang Kamu Mau
                                    </h6>
                                    <h5 class="card-title text-center mt-2" id="dynamicLabelSecond"><?= $merk ?></h5>
                                    <p class="text-center">
                                        <img id="displayImageSecond" src="<?php echo base_url('assets/hpbaru/ilustrasihp.jpg'); ?>" alt="Selected Image">
                                    </p>
                                </div>
                                
                                <div class="select-container">
                                    <select name="nama_second" class="js-example-basic-single" id="nama_second" required>
                                        <option value="">Pilih Merk HP..</option>
                                        <option value="iPhone">iPhone</option>
                                    </select>
                                    <select name="id_second" class="js-example-basic-single" id="id_second" required>
                                        <option value="">Pilih ID Baru</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <p class="text-center">
                                <button type="submit" class="btn btn-warning" style="border-radius:10px; width: 300px;">
                                    <b style="font-family: 'Poppins', sans-serif;">
                                        CEK SEKARANG
                                    </b>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- END Second ke Second -->

        <div class="container">
            <p class="text-center" style="font-family: 'Poppins', sans-serif;">Harga yang tertera adalah harga estimasi tukar tambah dan bisa berubah sewaktu waktu.
            <br>
            <br>
            <b>Upgrade Sekarang, hemat lebih banyak ! Tukar tambah handphonemu hari ini.</b></p>
            <p class="text-center" style="font-family: 'Poppins', sans-serif;"><a target="_blank" href="https://wa.me/628115546464" class="btn btn-m btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i> HUBUNGI CALL CENTER</a></p>
        </div>

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

            $('#id_tipe_second').select2({
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

            $('#id_second').select2({
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

            $('#nama_second').select2({
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

            // For the first dropdown (id_tipe_second)
            $('#id_tipe_second').change(function () {
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
                            $('#displayImageBekasSecond').attr('src', imagePath); // Update image source
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#displayImageBekasSecond').attr('src', '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>');
                    }
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath = $('#id_tipe_second option:selected').data('gambar_tipe') ? '<?php echo base_url(); ?>' + $('#id_tipe_second option:selected').data('gambar_tipe') : '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>';
            console.log('Initial Image Path:', initialImagePath); // Debug log
            $('#displayImageBekasSecond').attr('src', initialImagePath); // Set initial image

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

            // For the second dropdown (id_second)
            $('#id_second').change(function () {
                var id_second = $(this).val();
                var selectedOptionText = $(this).find('option:selected').text();
                const words = selectedOptionText.trim().split(' '); // Split into an array of words
                const firstWord = words[0];
                console.log('Selected ID:', id_second); // Debug log
                $.ajax({
                    url: '<?php echo site_url("tukar_tambah/get_image_url_second"); ?>',
                    method: 'POST',
                    data: { id_second: id_second },
                    success: function (response) {
                        console.log('AJAX Response:', response); // Debug log
                        try {
                            var data = JSON.parse(response);
                            var imagePath = data.gambar_second ? '<?php echo base_url("assets/hpsecond/"); ?>' + data.gambar_second : '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';
                            console.log('Constructed Image Path:', imagePath); // Debug log
                            $('#displayImageSecond').attr('src', imagePath); // Update image source
                            $('#dynamicLabelSecond').text(firstWord); // Update label text
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#displayImageSecond').attr('src', '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>');
                        $('#dynamicLabelSecond').text('Apple'); // Reset to default label
                    }
                });
            });

            // Trigger initial image load based on the default selected option
            var initialImagePath2 = $('#id_second option:selected').data('gambar_second') ? '<?php echo base_url(); ?>' + $('#id_second option:selected').data('gambar_second') : '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';
            var initialLabelText = $('#id_second option:selected').text().split(' ')[0];
            console.log('Initial Image Path:', initialImagePath2); // Debug log
            $('#displayImageSecond').attr('src', initialImagePath2); // Set initial image
            $('#dynamicLabelSecond').text(initialLabelText); // Set initial label

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

    <script>
        $(document).ready(function() {
            // Kosongkan opsi di id_second pada saat halaman dimuat
            $('#id_second').empty();
            $('#id_second').append('<option value="">Pilih ID Baru</option>');
            
            $('#nama_second').change(function() {
                var selectedNamaSecond = $(this).val().toLowerCase();

                // Kosongkan opsi di id_second
                $('#id_second').empty();
                
                // Tambahkan kembali opsi default
                $('#id_second').append('<option value="">Pilih ID Second</option>');

                <?php foreach ($all_second as $dataTipe): ?>
                var nama_second = '<?= strtolower($dataTipe->nama_second) ?>';
                if (nama_second.includes(selectedNamaSecond)) {
                    $('#id_second').append('<option value="<?= $dataTipe->id_second ?>" data-gambar_second="<?= $dataTipe->gambar_second ?>"><?= $dataTipe->nama_second ?></option>');
                }
                <?php endforeach; ?>
            });
        });
    </script>
</body>

<?php include 'footer.php'; ?>

</html>
