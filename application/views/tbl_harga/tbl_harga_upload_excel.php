<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">IMPORT EXCEL HARGA HANDPHONE</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
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
	</section>
</div>