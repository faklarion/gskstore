<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets/img/gsk-favicon.png') ?>" type="image/x-icon">
    <meta name="description"
        content="Cek Harga Second Handphone Kamu Dan Dapatkan Harga Terbaik Hanya Di Galery Second Kalimantan.">
    <title>Dapatkan Penawaran Harga Terbaik Handphone Kamu Di Galery Second Kalimantan</title>
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap-grid.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap-reboot.min.css'); ?>">
    <script src="<?= base_url('assets/vendor/number/jquery.number.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
</head>

<!-- <script>
        $(document).ready(function () {
                $("#country").keyup(function () {
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('cek_harga/GetTipeName'); ?>",
                                data: {
                                        keyword: $("#country").val()
                                },
                                dataType: "json",
                                success: function (data) {
                                        if (data.length > 0) {
                                                $('#DropdownCountry').empty();
                                                $('#country').attr("data-toggle", "dropdown");
                                                $('#DropdownCountry').dropdown('toggle');
                                        }
                                        else if (data.length == 0) {
                                                $('#country').attr("data-toggle", "");
                                        }
                                        $.each(data, function (key, value) {
                                                if (data.length >= 0)
                                                        $('#DropdownCountry').append('<li><a href="<?= base_url('cek_harga/detail_tipe/') ?>' + value['id_tipe'] + '" class="search-result">' + value['nama_tipe'] + '</a></li>');
                                        });
                                }
                        });
                });
                $('ul.txtcountry').on('click', 'li a', function () {
                        location.href = "<?php echo base_url('cek_harga/detail_tipe/') ?>" + value['id_tipe'];
                });
        });
</script> -->
<style>
    .select2-container .select2-selection {
        border-radius: 20px;
        height: 30px;
    }

    .select2-container--classic .select2-selection--single .select2-selection__arrow b {
        background-image: url(https://cdn4.iconfinder.com/data/icons/user-interface-174/32/UIF-76-512.png);
        background-color: transparent;
        background-size: contain;
        border: none !important;
        height: 20px !important;
        width: 20px !important;
        margin: auto !important;
        top: auto !important;
        left: auto !important;
    }

    .custom-search {
        position: relative;
        width: 70%;
        margin: auto;

    }

    .custom-search-input {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 100px;
        padding: 10px 100px 10px 20px;
        line-height: 1;
        box-sizing: border-box;
        outline: none;
    }

    .custom-search-input:focus {
        outline: none;
        border-color: #9ecaed;
        box-shadow: 0 0 10px #9ecaed;
    }

    .custom-search-botton {
        position: absolute;
        right: 3px;
        top: 3px;
        bottom: 3px;
        border: 0;
        color: #000;
        outline: none;
        margin: 0;
        padding: 0 10px;
        border-radius: 100px;
        z-index: 2;
    }
</style>

<body style="background-color: #ffffff;">
<nav class="navbar bg-dark">
            <div class="container-fluid justify-content-center" style="min-height: 10%;">
                <a class="text-center" href="https://syihabstore.id">
                <img src="<?= base_url('assets/img/gsklogogold.png') ?>" width="150px">
                </a>
            </div>
        </nav>
    <section>
            <div class="container my-3">
                <h3 class="text-center" style="font-family: Arial, Helvetica, sans-serif;"><b>Cek Harga Tukar Tambah
                        Handphone <?php echo $merk?> Kamu Disini </b></h3>
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
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $merk ?></h5>
                            </div>
                            <img src="<?php echo base_url('assets/img/ilustrasihp.jpg')?>" class="card-img-top" alt="Card image">
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
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $merk ?></h5>
                            </div>
                            <img src="<?php echo base_url('assets/img/ilustrasihp.jpg')?>" class="card-img-top" alt="Card image">
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