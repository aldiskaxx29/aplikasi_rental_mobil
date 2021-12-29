<?php  ?>
<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Data type</h1>
		</div>
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label>Kode Type</label>
							<input type="hidden" name="id" value="<?= $type['id_type']; ?>">
							<input type="textx" name="kode" class="form-control" value="<?= $type['kode_type']; ?>">
						</div>
						<div class="form-group">
							<label>Nama Type</label>
							<input type="text" name="nama" class="form-control" value="<?= $type['nama_type']; ?>">
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?= base_url('admin/data_type'); ?>" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>