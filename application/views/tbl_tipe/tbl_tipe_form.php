<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TIPE HANDPHONE</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Merk <?php echo form_error('id_merk') ?></td>
						<td>
							<select name="id_merk" id="id_merk" class="form-control">
							<?php foreach ($data_merk as $row) {  ?>
							<option value="<?= $row->id_merk?>" <?php if($id_merk==$row->id_merk) echo 'selected="selected"'; ?>><?= $row->nama_merk?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Nama Tipe <?php echo form_error('nama_tipe') ?></td><td><input type="text" class="form-control" name="nama_tipe" id="nama_tipe" placeholder="Nama Tipe" value="<?php echo $nama_tipe; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_tipe" value="<?php echo $id_tipe; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_tipe') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>