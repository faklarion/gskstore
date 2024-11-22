<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA HP SECOND</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
                <div class='col-md-9'>
                    <div style="padding-bottom: 10px;">
                        <?php echo anchor(site_url('tbl_second/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                        <?php echo anchor(site_url('tbl_second/export_excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel', 'class="btn btn-info btn-sm"'); ?>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Import Excel</button>
                    </div>
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
                    <th class="text-center">Nama second</th>
                    <th class="text-center">Harga second</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($Tbl_second_data as $tbl_second)
            {
                ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php echo $tbl_second->nama_second ?></td>
                    <td><?php echo rupiah($tbl_second->harga_second) ?></td>
                    <td class="text-center"><img src="<?php echo base_url('assets/hpsecond/'.$tbl_second->gambar_second.'')?>" alt="<?php echo $tbl_second->gambar_second?>" width="20%"></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        //echo anchor(site_url('tbl_second/read/'.$tbl_second->id_second),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        //echo '  '; 
                        echo anchor(site_url('tbl_second/update/'.$tbl_second->id_second),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        echo '  '; 
                        echo anchor(site_url('tbl_second/delete/'.$tbl_second->id_second),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Import Excel</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <form action="<?php echo site_url('tbl_second/upload_excel') ?>" method="post" enctype="multipart/form-data">
			    <table class='table table-bordered'>
	                <tr>
						<td width='200'>Upload File</td>
						<td>
						<input type="file" name="file" id="file" class="form-control" required/>							
						</td>
					</tr>
                    <tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Import</button> 
							<a href="<?php echo site_url('tbl_harga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            'responsive': true
        });
    });
</script>