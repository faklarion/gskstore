<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA HP BARU</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Baru <?php echo form_error('nama_baru') ?></td><td><input type="text" class="form-control" name="nama_baru" id="nama_baru" placeholder="Nama Baru" value="<?php echo $nama_baru; ?>" /></td>
					</tr>
					
					<tr>
						<td width='200'>Harga Baru <?php echo form_error('harga_baru') ?></td><td><input type="number" class="form-control" name="harga_baru" id="harga_baru" placeholder="Harga Baru" value="<?php echo $harga_baru; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Gambar </td>
						<td> <input type="file" class="form-control" rows="3" name="gambar_baru" id="gambar_baru" placeholder="Gambar Baru"><?php echo $gambar_baru; ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_baru" value="<?php echo $id_baru; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_baru') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>