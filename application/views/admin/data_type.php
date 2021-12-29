 btn-sm<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Type</h1>
		</div>
		<?= $this->session->flashdata('type'); ?>
		<a href="<?= base_url('admin/data_type/tambah_type'); ?>" class="btn btn-primary">Tambah Type</a><hr>

		<table class="table table-bordered table-hover table-striped" id="table1">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Type</th>
					<th>Nama Type</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			<?php foreach ($type as $t): ?>
								<tr>
					<td style="width:15px;"><?= $i; ?></td>
					<td><?= $t->kode_type; ?></td>
					<td style="width:50%;"><?= $t->nama_type ?></td>
					<td>
						<a href="<?= base_url('admin/data_type/hapus_type/') .$t->id_type ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus');">Delete</a>
						<a href="<?= base_url('admin/data_type/ubah_type/') .$t->id_type ?>" class="btn btn-warning btn-sm">Update</a>
						<a href="<?= base_url('admin/data_type/detail_type/') .$t->id_type ?>" class="btn btn-info btn-sm">Detail</a>
					</td>
				</tr>
			<?php $i++; ?>
			<?php endforeach ?>
			</tbody>
		</table>
		
	</section>
</div>