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
    <link href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
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
    @media (min-width: 50px) {
        /* show 3 items */
        .carousel-inner .active,
        .carousel-inner .active+.carousel-item,
        .carousel-inner .active+.carousel-item+.carousel-item,
        .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item,
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item,
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item+.carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        .carousel-inner .active.carousel-item+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -25%;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* left or forward direction */
        .active.carousel-item-left+.carousel-item-next.carousel-item-left,
        .carousel-item-next.carousel-item-left+.carousel-item,
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item,
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item,
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        /* farthest right hidden item must be abso position for animations */
        .carousel-inner .carousel-item-prev.carousel-item-right {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* right or prev direction */
        .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
        .carousel-item-prev.carousel-item-right+.carousel-item,
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item,
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item,
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }

    }

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
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a href="<?php echo site_url('cek_harga') ?>"><b style="color: white;">Jual HP</b></a>
                <img src="<?= base_url('assets/img/logogskwhite.png') ?>" alt="" width="10%">
            </div>
        </nav>
        <div class="container my-3">
            <div>
                <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
                    <b>Merek Handphone Terlaris</b>
                </h2>
            </div>
            <div class="custom-search">
                <select name="id_tipe" class="js-example-basic-single" id="id_tipe" required
                    onchange="window.location.assign('<?php echo site_url('cek_harga/detail_tipe/') ?>' + this.options[this.selectedIndex].value)">
                    <option value="">Cari Harga handphone yang ingin kamu jual</option>
                    <?php foreach ($merk as $row) { ?>
                        <optgroup label="<?php echo $row->nama_merk ?>">
                            <?php $listTipe = $this->Tbl_harga_model->get_all_tipe_by_merk($row->id_merk);
                            foreach ($listTipe as $dataTipe): ?>
                                <option value="<?= $dataTipe->id_tipe ?>"><?php echo $dataTipe->nama_merk ?>
                                    <?= $dataTipe->nama_tipe ?>
                                </option>
                            <?php endforeach ?>
                        </optgroup>
                    <?php } ?>
                </select>
            </div>
            <div>
                <div class="row">
                    <?php foreach ($merk as $row): ?>
                        <div class="col-6 col-sm-3 mt-4 d-none d-sm-block">
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
            <div id="carouselExample" class="carousel slide d-block d-sm-none" data-ride="carousel" data-interval="9000">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    <div class="carousel-item col-md-3  active">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 1" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=1"
                                        alt="slide 1">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 3" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=2"
                                        alt="slide 2">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 4" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=3"
                                        alt="slide 3">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 5" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=4"
                                        alt="slide 4">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 6" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=5"
                                        alt="slide 5">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 7" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=6"
                                        alt="slide 6">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 8" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=7"
                                        alt="slide 7">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item col-md-3  ">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <a href="#" title="image 2" class="thumb">
                                    <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=8"
                                        alt="slide 8">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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

            <p class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
                Harga yang tertera adalah harga estimasi Handphone mulus like new
                <br> jika ada minus fungsi atau minus fisik harga akan berubah sesuai kerusakan.
            </p>
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
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
</script>
<script>
    $('#carouselExample').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $('.carousel-item').length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                }
                else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
    });


    $('#carouselExample').carousel({
        interval: 2000
    });


    $(document).ready(function () {
        /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function (event) {
            event.preventDefault();
            var content = $('.modal-body');
            content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);
            content.html($(this).html());
            $(".modal-profile").modal({ show: true });
        });

    });
</script>