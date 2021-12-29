 btn-sm<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Mobil</h1>
		</div>
		<div class="section-body">
			<?= $this->session->flashdata('mobil'); ?>
			<a href="<?= base_url('admin/data_mobil/tambah_mobil'); ?>" class="btn btn-primary">Tambah Mobil</a><hr>

			<table class="table table-bordered table-hover table-striped" id="table1">
				<thead>
					<tr>
						<th>NO</th>
						<th>Kode Type</th>
						<th>Merk</th>
						<th>No Plat</th>
						<th>Warna</th>
						<th>Tahun</th>
						<th>Status</th>
						<th>Gambar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=1; ?>
				<?php foreach ($mobil as $m): ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $m->kode_type ?></td>
						<td><?= $m->merk ?></td>
						<td><?= $m->no_plat ?></td>
						<td><?= $m->warna ?></td>
						<td><?= $m->tahun ?></td>
						<td>
							<?php if ($m->status == '0'): ?>
								<div class="badge badge-danger">Up</div>
								<?php else: ?>
								<div class="badge badge-success">Ada</div>
							<?php endif ?>			
						</td>
						<td><img src="<?= base_url('assets/assets_admin/foto/'). $m->gambar ?>" width="50"></td>
						<td>
							<a href="<?= base_url('admin/data_mobil/hapus_mobil/') . $m->id_mobil ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus');">Delete</a>
							<a href="<?= base_url('admin/data_mobil/ubah_mobil/') . $m->id_mobil ?>" class="btn btn-warning btn-sm">Update</a>
							<a href="<?= base_url('admin/data_mobil/detail_mobil/') . $m->id_mobil ?>" class="btn btn-info btn-sm">Detail</a>
						</td>
					</tr>			
				<?php $i++; ?>		
				<?php endforeach ?>
				</tbody>
			</table>			
		</div>
				
	</section>
</div>