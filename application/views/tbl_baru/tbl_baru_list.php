<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA HP BARU</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('tbl_baru/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table id="example" class="table table-bordered" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Baru</th>
                    <th class="text-center">Harga Baru</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_baru_data as $tbl_baru)
            {
                ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php echo $tbl_baru->nama_baru ?></td>
                    <td><?php echo rupiah($tbl_baru->harga_baru) ?></td>
                    <td class="text-center"><img src="<?php echo base_url('assets/hpbaru/'.$tbl_baru->gambar_baru.'')?>" alt="<?php echo $tbl_baru->gambar_baru?>" width="20%"></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        //echo anchor(site_url('tbl_baru/read/'.$tbl_baru->id_baru),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        //echo '  '; 
                        echo anchor(site_url('tbl_baru/update/'.$tbl_baru->id_baru),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        echo '  '; 
                        echo anchor(site_url('tbl_baru/delete/'.$tbl_baru->id_baru),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            'responsive': true
        });
    });
</script>