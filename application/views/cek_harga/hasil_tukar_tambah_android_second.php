<html>

<?php include 'header_ip.php'; ?>
<script>
        $(document).ready(function() {
            // Initially hide both forms
            $('#ttbaru').hide();
            $('#ttsecond').show();

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
<style>
        /* Gaya untuk overlay */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Gaya untuk popup */
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            position: relative;
        }

        /* Gaya untuk tombol close */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #333;
        }

        .popup-content button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:hover {
            background-color: #0056b3;
        }
    </style>
<body style="background-color: #ffffff;">
    
        <div class="popup-overlay" id="popup">
            <div class="popup-content">
                <!-- Tombol Close -->
                <span class="close-btn" onclick="closePopup()"><i class="fas fa-times"></i></span>
                <a href="https://wa.me/628115546464"><img src="<?= base_url('assets/img/popup.jpg')?>" width="100%"></a> 
            </div>
        </div>
        <div class="container my-3">
            <h3 class="text-center" style="font-family: 'Poppins', sans-serif;"><b>Cek Harga Tukar Tambah Handphone <?= $merk ?> Kamu Disini </b></h3>
        </div>
        <div class="container" width="50%">
            <b>
                <a class="text-muted hover-overlay" style="font-family: 'Poppins', sans-serif;" href="<?php echo site_url('tukar_tambah_android/') ?>">Halaman Utama </a>
            </b>
            <i class="fa fa-chevron-right text-muted"></i> 
            <b class="text-muted" style="font-family: 'Poppins', sans-serif;">
                <?php echo $merk; ?>
            </b>
        </div>

                <!-- Dropdown untuk memilih formulir -->
        <div class="container my-2">
            <h6>Pilih jenis tukar tambah kamu : </h6>
            <select id="formSelect" style="margin-bottom: 20px;" class="form-control">
                <option value="form1">Tukar Tambah ke HP Baru</option>
                <option value="form2" selected>Tukar Tambah ke HP Second</option>
            </select>
        </div>

        <div class="container">
            <form action="<?php echo site_url('tukar_tambah_android/tt_action') ?>" method="get" enctype="multipart/form-data"
                autocomplete="off" id="ttbaru">
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
                                    <h5 class="card-title text-center mt-2"><?php echo $merk; ?></h5>
                                    <p class="text-center">
                                        <img id="displayImageBekas" src="<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>" alt="Selected Image">
                                    </p>
                                </div>

                                <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required>
                                    <option value="">Cari Harga handphone yang ingin kamu jual</option>
                                    <?php foreach ($tipe as $dataTipe): ?>
                                        <option value="<?= $dataTipe->id_harga ?>"
                                            data-gambar_tipe="<?= $dataTipe->gambar_tipe ?>">
                                            <?= $dataTipe->nama_merk ?>     <?= $dataTipe->nama_tipe ?> /
                                            <?= $dataTipe->nama_memori ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                        <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Yang Kamu Mau
                                    </h6>
                                    <h5 class="card-title text-center mt-2" id="dynamicLabel">Pilih</h5>
                                    <p class="text-center">
                                        <img id="displayImage" src="<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>"
                                            alt="Selected Image">
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
                                        <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                                        <?php foreach ($all_brand as $dataTipe): ?>
                                            <option value="<?= $dataTipe->id_baru ?>"> <?= $dataTipe->nama_baru ?>
                                            <?php endforeach ?>
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
        </div>

        <div class="container">
            <form action="<?php echo site_url('tukar_tambah_android/tt_action_second') ?>" method="get" enctype="multipart/form-data" id="ttsecond"
                autocomplete="off">
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
                                    <h5 class="card-title text-center mt-2"><?php echo $merk; ?></h5>
                                    <p class="text-center">
                                        <img id="displayImageBekasSecond"   src="<?php echo base_url("assets/hptipe/$gambarBekas"); ?>" alt="Selected Image">
                                    </p>
                                </div>

                                <select name="id_tipe_second" class="js-example-basic-single" id="id_tipe_second" required>
                                    <option value="">Cari Harga handphone yang ingin kamu jual</option>
                                    <?php foreach ($tipe as $dataTipe): ?>
                                        <option value="<?= $dataTipe->id_harga ?>"
                                            data-gambar_tipe="<?= $dataTipe->gambar_tipe ?>" <?php if ($dataTipe->id_harga == $id_tipe_second)
                                                echo 'selected="selected"'; ?>>
                                            <?= $dataTipe->nama_merk ?>     <?= $dataTipe->nama_tipe ?> /
                                            <?= $dataTipe->nama_memori ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                        <div class="card mb-2" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                                <div style="flex-grow: 1;">
                                    <h6 class="card-title text-center" style="font-family: 'Poppins', sans-serif; margin: 0; border: 1px solid gray; border-radius: 10px; padding:5px; background-color: gray; color: white;">
                                        HP Yang Kamu Mau
                                    </h6>
                                    <h5 class="card-title text-center mt-2" id="dynamicLabelSecond">
                                        <?php 
                                            echo $namaBrand
                                        ?>
                                    </h5>
                                    <p class="text-center">
                                        <img id="displayImageSecond"  src="<?php echo base_url("assets/hpsecond/$gambar"); ?>"
                                            alt="Selected Image">
                                    </p>
                                </div>
                                <div class="select-container">
                                    <select name="nama_second" class="js-example-basic-single" id="nama_second" required>
                                        <option value="">Pilih Merk HP..</option>
                                        <option value="iPhone"  <?php if ('iPhone' == $namaBrand)
                                                echo 'selected="selected"'; ?>>iPhone</option>
                                    </select>

                                    <select name="id_second" class="js-example-basic-single" id="id_second" required>
                                        <option value="">Cari Harga handphone yang ingin kamu tukar</option>
                                        <?php foreach ($all_second as $dataTipe): ?>
                                            <option value="<?= $dataTipe->id_second ?>" 
                                                <?php if ((string)$dataTipe->id_second === (string)$id_second) echo 'selected="selected"'; ?> data-gambar_second="<?= $dataTipe->gambar_second ?>">
                                                <?= $dataTipe->nama_second ?>
                                            </option>
                                        <?php endforeach; ?>
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
        </div>


        <?php
        $tipe = $this->Tbl_harga_model->get_all_tt_by_id($this->input->get('id_tipe_second'));
        $second = $this->Tbl_harga_model->get_all_second_by_id($this->input->get('id_second'));

        // Inisialisasi nilai default
        $hargaTipe = $hargaSecond = 0;

        if ($tipe) {
            $hargaTipe = $tipe->harga;
        }

        if ($second) {
            $hargaSecond = $second->harga_second;
        }

        $hargaTT = $hargaSecond - $hargaTipe;

        // Menentukan output berdasarkan nilai $hargaTT
        if ($hargaTT < 0) {
            $output = "Cashback Rp " . number_format(abs($hargaTT), 0, ',', '.');
        } else {
            $output = "Rp " . number_format($hargaTT, 0, ',', '.');
        }

        ?>

        <div class="container">
                <h4 class="text-center" style="font-family: 'Poppins', sans-serif;">
                    Harga Estimasi Tukar Tambah Adalah 
                </h4>
                <h4 class="text-center" style="font-family: 'Poppins', sans-serif; background-color: red; color: white; padding: 10px; border-radius: 20px;">
                    <?= ($output); ?>
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
                    <p class="text-center" style="font-family: 'Poppins', sans-serif;">Harga yang tertera adalah harga estimasi tukar tambah dan bisa berubah sewaktu waktu.
                    <br>
                    <br>
                    <b>Upgrade Sekarang, hemat lebih banyak ! Tukar tambah handphonemu hari ini.</b></p>
                    <p class="text-center" style="font-family: 'Poppins', sans-serif;"><a target="_blank" href="https://wa.me/628115546464" class="btn btn-m btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i> HUBUNGI CALL CENTER</a></p>
        </div>
        </div>
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
    $(document).ready(function () {
        $('#id_tipe_second').select2({
            width: '100%',
            allowClear: true,
            placeholder: '<i class="fa fa-search"></i> <small>HP di jual..</small>',
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
    $(document).ready(function () {
        $('#id_second').select2({
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
    });
</script>
<script>
    $(document).ready(function () {
        // Event listener untuk perubahan pilihan dropdown
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
        var selectedOption = $('#id_tipe option:selected');
        var gambarTipe = selectedOption.data('gambar_tipe');
        console.log('Initial Gambar Tipe:', gambarTipe); // Debug log
        var base_url = '<?php echo base_url("assets/hptipe/"); ?>';
        var defaultImage = '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>';

        var initialImagePath;
        if (gambarTipe && gambarTipe.trim() !== '') {
            initialImagePath = base_url + gambarTipe;
        } else {
            initialImagePath = defaultImage;
        }

        console.log('Final Initial Image Path:', initialImagePath); // Debug log
        $('#displayImageBekas').attr('src', initialImagePath); // Set initial image
    });

</script>
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            // Event listener untuk perubahan pilihan dropdown
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
                            $('#dynamicLabel').text(firstWord);
                            $('#displayImage').attr('src', imagePath); // Update image source
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                });
            });

            // Pengaturan gambar dan label awal
            var selectedOption = $('#id_baru option:selected');
            var gambarBaru = selectedOption.data('gambar_baru');
            console.log('Initial Gambar Baru:', gambarBaru); // Debug log
            var base_url = '<?php echo base_url("assets/hpbaru/"); ?>';
            var defaultImage = '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';

            var initialImagePath;
            if (gambarBaru && gambarBaru.trim() !== '') {
                initialImagePath = base_url + gambarBaru;
            } else {
                initialImagePath = defaultImage;
            }

            console.log('Final Initial Image Path:', initialImagePath); // Debug log
            var initialLabelText = selectedOption.text().split(' ')[0];
            $('#dynamicLabel').text(initialLabelText); // Set initial label
            $('#displayImage').attr('src', initialImagePath); // Set initial image
        });
    });

</script>
<script>
    $(document).ready(function () {
        // Kosongkan opsi di id_baru pada saat halaman dimuat
        $('#id_baru').empty();
        $('#id_baru').append('<option value="">Pilih ID Baru</option>');

        // Set opsi id_baru berdasarkan pilihan nama_baru dari URL
        var selectedNamaBaru = '<?= isset($namaBrand) ? strtolower($namaBrand) : '' ?>';
        <?php if (isset($namaBrand)): ?>
            <?php foreach ($all_brand as $dataTipe): ?>
                var nama_baru = '<?= strtolower($dataTipe->nama_baru) ?>';
                if (nama_baru.includes(selectedNamaBaru)) {
                    $('#id_baru').append('<option value="<?= $dataTipe->id_baru ?>" data-gambar_baru="<?= $dataTipe->gambar_baru ?>" <?= isset($id_baru) && $id_baru == $dataTipe->id_baru ? 'selected' : '' ?>><?= $dataTipe->nama_baru ?></option>');
                }
            <?php endforeach; ?>
        <?php endif; ?>

        // Event listener untuk perubahan nama_baru
        $('#nama_baru').change(function () {
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
// For the first dropdown (id_tipe)
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
    var selectedOption = $('#id_tipe_second option:selected');
    var gambarTipe = selectedOption.data('gambar_tipe');
    console.log('Initial Gambar Tipe:', gambarTipe); // Debug log
    var base_url = '<?php echo base_url("assets/hptipe/"); ?>';
    var defaultImage = '<?php echo base_url("assets/hptipe/ilustrasihp.jpg"); ?>';
    var initialImagePath;
    if (gambarTipe && gambarTipe.trim() !== '') {
            initialImagePath = base_url + gambarTipe;
        } else {
            initialImagePath = defaultImage;
        }
    console.log('Final Initial Image Path:', initialImagePath); // Debug log
    $('#displayImageBekasSecond').attr('src', initialImagePath); // Set initial image
</script>
<script>
    $(document).ready(function () {
        // Kosongkan opsi di id_second pada saat halaman dimuat
        $('#id_second').empty();
        $('#id_second').append('<option value="">Pilih ID Baru</option>');

        // Set opsi id_second berdasarkan pilihan nama_second dari URL
        var selectedNamaBaru = '<?= isset($namaBrand) ? strtolower($namaBrand) : '' ?>';
        <?php if (isset($namaBrand)): ?>
            <?php foreach ($all_brand as $dataTipe): ?>
                var nama_second = '<?= strtolower($dataTipe->nama_second) ?>';
                if (nama_second.includes(selectedNamaBaru)) {
                    $('#id_second').append('<option value="<?= $dataTipe->id_second ?>" data-gambar_second="<?= $dataTipe->gambar_second ?>" <?= isset($id_baru) && $id_second == $dataTipe->id_second ? 'selected' : '' ?>><?= $dataTipe->nama_second ?></option>');
                }
            <?php endforeach; ?>
        <?php endif; ?>

        // Event listener untuk perubahan nama_second
        $('#nama_second').change(function () {
            var selectedNamaBaru = $(this).val().toLowerCase();

            // Kosongkan opsi di id_baru
            $('#id_second').empty();

            // Tambahkan kembali opsi default
            $('#id_second').append('<option value="">Pilih ID Baru</option>');

            <?php foreach ($all_brand as $dataTipe): ?>
                var nama_second = '<?= strtolower($dataTipe->nama_second) ?>';
                if (nama_second.includes(selectedNamaBaru)) {
                    $('#id_second').append('<option value="<?= $dataTipe->id_second ?>" data-gambar_second="<?= $dataTipe->nama_second ?>"><?= $dataTipe->nama_second ?></option>');
                }
            <?php endforeach; ?>
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            // Event listener untuk perubahan pilihan dropdown
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
                            $('#dynamicLabelSecond').text(firstWord);
                            $('#displayImageSecond').attr('src', imagePath); // Update image source
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    },
                });
            });

            // Pengaturan gambar dan label awal
            var selectedOption = $('#id_second option:selected');
            var gambarSecond = selectedOption.data('gambar_second');
            console.log('Initial Gambar Baru:', gambarSecond); // Debug log
            var base_url = '<?php echo base_url("assets/hpsecond/"); ?>';
            var defaultImage = '<?php echo base_url("assets/hpbaru/ilustrasihp.jpg"); ?>';

            var initialImagePath;
            if (gambarSecond && gambarSecond.trim() !== '') {
                initialImagePath = base_url + gambarSecond;
            } else {
                initialImagePath = defaultImage;
            }

            console.log('Final Initial Image Path Second:', initialImagePath); // Debug log
           
            var initialLabelText = selectedOption.text().split(' ')[0];
            console.log('Final Initial Label Second:', <?php echo $namaBrand?>); // Debug log
            $('#dynamicLabelSecond').text(<?php echo $namaBrand?>); // Set initial label
            $('#displayImageSecond').attr('src', initialImagePath); // Set initial image
        });
    });
</script>
<script>
        // Menampilkan popup setelah 3 detik
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('popup').style.display = 'flex';
            }, 3000);
        };

        // Menutup popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
</script>