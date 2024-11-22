<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA HP SECOND</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama second <?php echo form_error('nama_second') ?></td><td><input type="text" class="form-control" name="nama_second" id="nama_second" placeholder="Nama second" value="<?php echo $nama_second; ?>" /></td>
					</tr>
					
					<tr>
						<td width='200'>Harga second <?php echo form_error('harga_second') ?></td><td><input type="number" class="form-control" name="harga_second" id="harga_second" placeholder="Harga second" value="<?php echo $harga_second; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Gambar </td>
						<td> <input type="file" class="form-control" rows="3" name="gambar_second" id="gambar_second" placeholder="Gambar second"><?php echo $gambar_second; ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_second" value="<?php echo $id_second; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_second') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>