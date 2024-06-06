<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TIPE HANDPHONE</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('tbl_tipe/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <form action="<?php echo site_url('tbl_tipe/index'); ?>" class="form-inline"
                                    method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                                ?>
                                                <a href="<?php echo site_url('tbl_tipe'); ?>"
                                                    class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-12">
                            <?php if($this->session->userdata('message')) { ?>
                            <div class="alert alert-info" role="alert">
                                <strong><?php echo $this->session->userdata('message'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <?php } ?> 
                        </div>
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-3 text-right">

                            </div>
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                                <th>Nama Merk</th>
                                <th>Nama Tipe</th>
                                <th>Action</th>
                            </tr><?php
                            foreach ($tbl_tipe_data as $tbl_tipe) {
                                ?>
                                <tr>
                                    <td width="10px"><?php echo ++$start ?></td>
                                    <td><?php echo $tbl_tipe->nama_merk ?></td>
                                    <td><?php echo $tbl_tipe->nama_tipe ?></td>
                                    
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        //echo anchor(site_url('tbl_tipe/read/' . $tbl_tipe->id_tipe), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        //echo '  ';
                                        echo anchor(site_url('tbl_tipe/update/' . $tbl_tipe->id_tipe), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        echo '  ';
                                        echo anchor(site_url('tbl_tipe/delete/' . $tbl_tipe->id_tipe), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>