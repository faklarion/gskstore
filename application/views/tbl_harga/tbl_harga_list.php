<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA HARGA HANDPHONE</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <!--    <?php echo anchor(site_url('tbl_harga/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?> -->
                                            <?php echo anchor(site_url('tbl_harga/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export/Download Excel', 'class="btn btn-success btn-sm"'); ?>
                                            <?php echo anchor(site_url('tbl_harga/import_excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Import/Upload Excel', 'class="btn btn-primary btn-sm"'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-12">
                                <?php if ($this->session->userdata('message')) { ?>
                                    <div class="alert alert-info" role="alert">
                                        <strong><?php echo $this->session->userdata('message'); ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- <div class='col-md-3'>
                                <form action="<?php echo site_url('tbl_harga/index'); ?>" class="form-inline"
                                    method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                                ?>
                                                <a href="<?php echo site_url('tbl_harga'); ?>"
                                                    class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        <!-- <div>
                            <p><b>Note : </b> Klik icon panah ( <i class="fa fa-arrow-right" aria-hidden="true"></i> )
                                untuk melihat detail harga tipe HP.</p>
                        </div> -->
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th width="500px">Merk - Tipe</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tbl_harga_data as $tbl_harga) {
                                $idTipe = $tbl_harga->id_tipe;
                                ?>
                                    <tr>

                                        <td width="100px" style="text-align:center"><?php echo ++$start ?></td>
                                        <td><?php echo $tbl_harga->nama_merk ?> <?php echo $tbl_harga->nama_tipe ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#myModal<?php echo $idTipe; ?>"> <i class="fa fa-eye"> LIHAT HARGA</i></button>
                                            <?php echo ' '; ?>
                                            <?php echo anchor(site_url('tbl_harga/tambah_harga/' . $tbl_harga->id_tipe), '<i class="fa fa-plus" aria-hidden="true"> TAMBAH HARGA</i>', 'class="btn btn-success btn-sm"'); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                        <!-- <div>
            <?php echo $pagination ?>
        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<?php 
    foreach ($tbl_harga_data as $tbl_harga) {
?>
<div id="myModal<?php echo $tbl_harga->id_tipe; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Harga <b><?= $tbl_harga->nama_merk?> <?= $tbl_harga->nama_tipe?></b></h4>
            </div>
            <!-- body modal -->
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Memori</th>
                            <th class="text-center">Kondisi</th>
                            <th class="text-center" width="150px">Kualifikasi</th>
                            <th class="text-center" width="120px">Harga</th>
                            <th class="text-center" width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $listHarga = $this->Tbl_harga_model->get_all_harga_by_id($tbl_harga->id_tipe);
                        $no = 1;
                        foreach ($listHarga as $row) :
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row->nama_memori ?></td>
                            <td><?php echo $row->nama_kondisi ?></td>
                            <td><?php echo $row->nama_kualifikasi ?></td>
                            <td><?php echo rupiah($row->harga) ?></td>
                            <td style="text-align:center" width="200px">
                                        <?php
                                        //echo anchor(site_url('tbl_tipe/read/' . $tbl_tipe->id_tipe), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        //echo '  ';
                                        echo anchor(site_url('tbl_harga/update/' . $row->id_harga), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        echo '  ';
                                        echo anchor(site_url('tbl_harga/delete/' . $row->id_harga), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"');
                                        ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            'responsive': true
        });
    });
</script>
<script>
    // Declare variables
    function myFunction2() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("mytable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            const tableData = tr[i].getElementsByTagName("td");
            let allTextContent = '';
            for (let ind = 0; ind < tableData.length; ind++) {
                allTextContent += tableData[ind].innerText;
            }

            if (allTextContent) {
                if (allTextContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>