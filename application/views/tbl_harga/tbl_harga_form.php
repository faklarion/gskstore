<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA HARGA HANDPHONE</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tipe <?php echo form_error('id_tipe') ?></td>
						<td>
						<select name="id_tipe" id="id_tipe" class="form-control" readonly>
							<?php foreach ($data_merk as $row) {  ?>
							<optgroup label="<?php echo $row->nama_merk ?>">
							<?php $listTipe = $this->Tbl_harga_model->get_all_tipe_by_merk($row->id_merk);
							foreach ($listTipe as $dataTipe) :  ?>
							<option value="<?= $dataTipe->id_tipe ?>" <?php if($id_tipe==$dataTipe->id_tipe) echo 'selected="selected"'; ?>><?php echo $dataTipe->nama_merk ?> <?= $dataTipe->nama_tipe?></option>
							<?php endforeach ?>	
							</optgroup>
							<?php } ?>
						</select>							
						</td>
					</tr>
	
					<tr>
						<td width='200'>Memori <p><small>(Pilih lainnya jika Apple Watch)</small></p> <?php echo form_error('id_memori') ?></td>
						<td>
						<select name="id_memori" id="id_memori" class="form-control">
							<?php foreach ($data_memori as $row) {  ?>
							<option value="<?= $row->id_memori ?>" <?php if($id_memori==$row->id_memori) echo 'selected="selected"'; ?>><?= $row->nama_memori?></option>
							<?php } ?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Kondisi <?php echo form_error('id_kondisi') ?></td>
						<td>
						<select name="id_kondisi" id="id_kondisi" class="form-control">
							<?php foreach ($data_kondisi as $row) {  ?>
							<option value="<?= $row->id_kondisi ?>" <?php if($id_kondisi==$row->id_kondisi) echo 'selected="selected"'; ?>><?= $row->nama_kondisi ?></option>
							<?php } ?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Kualifikasi <?php echo form_error('id_kualifikasi') ?></td>
						<td>
						<select name="id_kualifikasi" id="id_kualifikasi" class="form-control">
							<?php foreach ($data_kualifikasi as $row) {  ?>
							<option value="<?= $row->id_kualifikasi ?>" <?php if($id_kualifikasi==$row->id_kualifikasi) echo 'selected="selected"'; ?>><?= $row->nama_kualifikasi ?></option>
							<?php } ?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_harga" value="<?php echo $id_harga; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_harga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>