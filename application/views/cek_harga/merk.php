<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets/img/gsk-favicon.png') ?>" type="image/x-icon">
    <meta name="description" content="Cek Harga Second Handphone Kamu Dan Dapatkan Harga Terbaik Hanya Di Galery Second Kalimantan.">
    <title>Dapatkan Penawaran Harga Terbaik Handphone Kamu Di Galery Second Kalimantan</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
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

<body style="background-color: #ffffff;">
<nav class="navbar bg-dark">
            <div class="container-fluid justify-content-center" style="min-height: 10%;">
                <a class="text-center" href="<?php echo site_url('cek_harga')?>">
                    <img src="<?= base_url('assets/img/gsklogogold.png') ?>" width="150px">
                </a>
            </div>
        </nav>
    <section>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
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
        <div class="container my-3">
           
        </div>

        <div class="container justify-content-center">
            <img class="img-fluid" src="<?= base_url('assets/img/banner.jpg') ?>">
        </div>
        <div>
            <h2 style="font-family: Arial, Helvetica, sans-serif;" class="text-center">
                <?php foreach ($tipe as $row): ?>
                   
                <?php endforeach ?>
                <b>
                    <?php $dataTipe = $this->Tbl_harga_model->get_all_merk_by_id(@$row->id_merk); 
                        foreach ($dataTipe as $list) {
                            echo 'Jual HP '.@$list->nama_merk.'';
                        }
                    ?>
                </b>
            </h2>
        </div>
        <div class="container" width="50%">
            <b><a class="text-muted hover-overlay" style="font-family: Arial, Helvetica, sans-serif;"
                    href="<?php echo site_url('cek_harga/') ?>">Halaman Utama </a></b><i
                class="fa fa-chevron-right text-muted"></i> <b class="text-muted"
                style="font-family: Arial, Helvetica, sans-serif;"><?php foreach ($tipe as $row): ?> 
                <?php endforeach ?>
                <?php $dataTipe = $this->Tbl_harga_model->get_all_merk_by_id(@$row->id_merk); 
                        foreach ($dataTipe as $list) {
                            echo @$list->nama_merk;
                        }
                    ?>
                </b>
        </div>
        <!-- <div class="custom-search my-3">
                <input type="text" class="custom-search-input" placeholder="Cari tipe hp kamu...">
                <button class="custom-search-botton" type="submit"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
</div> -->
        <div class="container my-3">
            <table class="table table-bordered display responsive small" style="width:100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama Tipe</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tipe as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row->nama_tipe ?></td>
                            <td class="text-center" width="20%">
                                <a href="<?= site_url('/cek_harga/detail_tipe/' . $row->id_tipe . '') ?>">
                                    <button type="button" class="btn btn-info" >Cek Harga</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true,
            filter: true,
            "searching": true,
            columnDefs: [{
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: -1
            },
            {
                responsivePriority: 3,
                targets: 1
            }
            ]
        });
    });
</script>