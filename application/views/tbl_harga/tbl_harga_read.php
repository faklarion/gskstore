
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_HARGA</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Tipe</td>
				<td><?php echo $id_tipe; ?></td>
			</tr>
	
			<tr>
				<td>Id Memori</td>
				<td><?php echo $id_memori; ?></td>
			</tr>
	
			<tr>
				<td>Id Kondisi</td>
				<td><?php echo $id_kondisi; ?></td>
			</tr>
	
			<tr>
				<td>Id Kualifikasi</td>
				<td><?php echo $id_kualifikasi; ?></td>
			</tr>
	
			<tr>
				<td>Harga</td>
				<td><?php echo $harga; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_harga') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>