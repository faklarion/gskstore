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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap-grid.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap-reboot.min.css'); ?>">
    <script src="<?= base_url('assets/vendor/number/jquery.number.min.js'); ?>"></script>
    <link href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<style>
    .radio-button {
        
    }

    .radio-button input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    .radio-button label {
        display: inline-block;
        background-color: #fff;
        padding: 10px 20px;
        font-family: sans-serif, Arial;
        font-size: 70%;
        border: 2px solid #444;
        border-radius: 15px;
        width: 30%;
        text-align: center;
    }

    .radio-button label:hover {
        background-color: #dfd;
    }

    .radio-button input[type="radio"]:checked+label {
        background-color: #808080;
        border-color: #333;
    }

    .custom-search {
        position: relative;
        width: 50%;
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
    <section>
        <div class="container my-3">
            <nav class="navbar navbar-light bg-light justify-content-between shadow p-3 mb-5 bg-white"
                style="border-radius: 25px;">
                <a href="<?php echo site_url('cek_harga')?>" ><b style="color: black;" >Jual HP</b></a>
                <img src="<?= base_url('assets/img/logogsk.png') ?>" alt="" width="10%">
            </nav>
        </div>

        <div>
            <p class="text-center"><img src="<?= base_url('assets/img/banner.jpg') ?>" width="70%"></p>
        </div>

        <div class="container" width="50%">
            <b><a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                    href="<?php echo site_url('cek_harga/') ?>">Halaman Utama </a></b><i
                class="fa fa-chevron-right text-muted"></i> <b><?php foreach ($tipe as $row): ?>
                    <a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                        href="<?php echo site_url('cek_harga/merk/' . $row->id_merk . '') ?>"> <?= $row->nama_merk ?></a> </b> <i
                    class="fa fa-chevron-right text-muted"></i> <b class="text-muted hover-overlay"
                    style="font-family: Arial, Helvetica, sans-serif;"><?= $row->nama_tipe ?></b>
            <?php endforeach ?></b>
        </div>
        <!-- <div class="custom-search my-3">
                <input type="text" class="custom-search-input" placeholder="Cari tipe hp kamu...">
                <button class="custom-search-botton" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div> -->
        </div>
        <div class="container my-3">
            <?php foreach ($tipe as $row): ?>
                <div class="card" style="background-color: #f0f0f0; border-radius: 10px;">
                    <div class="card-body">
                        <h3 style="font-family: Arial, Helvetica, sans-serif;" class="card-title">
                            <b><?= $row->nama_merk ?> <?= $row->nama_tipe ?></b></h3>
                        <?php $_SESSION['id'] = $row->id_tipe; ?>
                        <?php endforeach ?>
                        
                        <form action="<?php echo site_url('cek_harga/detail_harga') ?>" method="get"
                            enctype="multipart/form-data" autocomplete="off">
                              
                            <div class="radio-button">
                            <input type="text" value="<?= $_SESSION['id'] ?>" name="id_tipe" hidden>
                                <p><small class="text-muted" style="font-family: Arial, Helvetica, sans-serif;">Memori (Note : Pilih lainnya jika Apple Watch)</small></p>                        
                                <?php foreach($memori as $row) : ?>
                                <input type="radio" id="<?php echo $row->nama_memori; ?><?php echo $row->id_memori; ?>" name="memori" value="<?php echo $row->id_memori; ?>" <?php if ($_SESSION['memori'] == $row->id_memori) echo 'checked'; ?>>
                                <label for="<?php echo $row->nama_memori; ?><?php echo $row->id_memori; ?>"><?php echo $row->nama_memori; ?></label>
                                <?php endforeach; ?>
                            </div>
                        
                            <div class="radio-button">
                                <p><small class="text-muted" style="font-family: Arial, Helvetica, sans-serif;">Kondisi Handphone</small></p>
                                <?php foreach($kondisi as $row) : ?>
                                <input type="radio" id="<?php echo $row->nama_kondisi; ?><?php echo $row->id_kondisi; ?>" name="kondisi" value="<?php echo $row->id_kondisi; ?>" <?php if ($_SESSION['kondisi'] == $row->id_kondisi) echo 'checked'; ?>>
                                <label for="<?php echo $row->nama_kondisi; ?><?php echo $row->id_kondisi; ?>"><?php echo $row->nama_kondisi; ?></label>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- <div class="radio-button">
                                <p><small class="text-muted" style="font-family: Arial, Helvetica, sans-serif;">Kualifikasi Handphone</small></p>
                                <?php foreach($kualifikasi as $row) : ?>
                                <input type="radio" id="<?php echo $row->nama_kualifikasi; ?><?php echo $row->id_kualifikasi; ?>" name="kualifikasi" value="<?php echo $row->id_kualifikasi; ?>" <?php if ($_SESSION['kualifikasi'] == $row->id_kualifikasi) echo 'checked'; ?>>
                                <label for="<?php echo $row->nama_kualifikasi; ?><?php echo $row->id_kualifikasi; ?>"><?php echo $row->nama_kualifikasi; ?></label>
                                <?php endforeach; ?>
                            </div> -->
                            <br>
                                <button type="submit" class="btn btn-warning" style="border-radius:10px; width: 300px;"><b
                                        style="font-family: Arial, Helvetica, sans-serif;">Lanjutkan</b></button>
                        </form>
                        <hr>
                    <div class="container">
                        <p class="text-secondary" style="font-family: Arial, Helvetica, sans-serif;"><small>Harga Jual HP Kamu</small></p>
                        <h2 style="font-family: Arial, Helvetica, sans-serif;">
                        <?php  
                        if ($record) {
                            $record;
                            echo ''.rupiah($record->harga).'';
                        ?> 
                        </h2>
                        <small>(<?php echo $record->nama_kualifikasi ?>)</small>
                        <?php } else {
                            echo 'Kriteria Tidak Ditemukan. Silahkan Temui Petugas Counter';
                            $record = false;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>