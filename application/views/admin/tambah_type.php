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
							<input type="textx" name="kode" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama Type</label>
							<input type="text" name="nama" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?= base_url('admin/data_type'); ?>" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>