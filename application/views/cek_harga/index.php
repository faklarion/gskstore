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
     <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
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
    <section>
        <div class="container my-3">
            <nav class="navbar navbar-light bg-light justify-content-between shadow p-3 mb-5 bg-white"
                style="border-radius: 25px;">
                <a href="<?php echo site_url('cek_harga')?>" ><b style="color: black;" >Jual HP</b></a>
                <img src="<?= base_url('assets/img/logogsk.png') ?>" alt="" width="10%">
            </nav>
            <div>
                <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif;"><b>Merek Handphone
                        Terlaris</b></h2>
            </div>
            <div class="custom-search">
                <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required
                        onchange="window.location.assign('<?php echo site_url('cek_harga/detail_tipe/')?>' + this.options[this.selectedIndex].value)">
                        <option value="">Cari Harga handphone yang ingin kamu jual</option>
                        <?php foreach ($merk as $row) {  ?>
							<optgroup label="<?php echo $row->nama_merk ?>">
							<?php $listTipe = $this->Tbl_harga_model->get_all_tipe_by_merk($row->id_merk);
							foreach ($listTipe as $dataTipe) :  ?>
							<option value="<?= $dataTipe->id_tipe ?>"><?php echo $dataTipe->nama_merk ?> <?= $dataTipe->nama_tipe?></option>
							<?php endforeach ?>	
							</optgroup>
						<?php } ?>>
                </select>
            </div>
            <div>
                <div class="row">
                    <?php foreach ($merk as $row): ?>
                        <div class="col-md-3 col-6 mt-4">
                            <a href="<?= site_url('/cek_harga/merk/' . $row->id_merk . '') ?>">
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
            <br>
            <br>
            <!--<div class="custom-search">
                <input class="custom-search-input" placeholder="Cek harga HP yang kamu jual disini..." type="text"
                        id="country" autocomplete="off" name="country" class="form-control">
                <button class="custom-search-botton" type="submit"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
            </div> -->
            <!--<ul class="dropdown-menu txtcountry" role="menu" aria-labelledby="dropdownMenu" id="DropdownCountry"></ul>-->

                <p class="text-center" style="font-family: Arial, Helvetica, sans-serif;">Harga yang tertera adalah
                    harga estimasi Handphone mulus like new <br> jika ada minus
                    fungsi atau minus fisik harga akan berubah sesuai kerusakan.</p>
        </div>
    </section>

</body>

</html>
<script>
            $(document).ready(function () {
                $('.js-example-basic-single').select2({
width: '100%',
allowClear: true,
placeholder: '<i class="fa fa-search"></i> Cari HP yang kamu jual..',
escapeMarkup : function(markup) {
    return markup;
}
});
            });
</script>