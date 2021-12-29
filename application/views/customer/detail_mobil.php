<?php  ?>

<div class="container mt-5 mb-5">
	<div class="card" style="margin-top: 200px;">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url('assets/assets_admin/foto/') .$mobil['gambar']; ?>" style="width:100%;">
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr>
							<th>Kode Type</th>
							<td><?= $mobil['kode_type'] ?></td>
						</tr>
						<tr>
							<th>Merk</th>
							<td><?= $mobil['merk'] ?></td>
						</tr>
						<tr>
							<th>No Plat</th>
							<td><?= $mobil['no_plat'] ?></td>
						</tr>
						<tr>
							<th>Warna</th>
							<td><?= $mobil['warna'] ?></td>
						</tr>
						<tr>
							<th>Tahun</th>
							<td><?= $mobil['tahun'] ?></td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
							<?php if ($mobil['status'] == '0'): ?>
								<span class="badge badge-danger">Tidak Tersedia/Sedang Di Rental</span>
								<?php else: ?>
								<span class="badge badge-success">Tersedia</span>
							<?php endif ?>
							</td>
						</tr>
						<tr>
							<th>Ac</th>
							<td>
							<?php if ($mobil['ac'] == '0'): ?>
								<span class="badge badge-danger">Tidak Tersedia</span>
								<?php else: ?>
								<span class="badge badge-success">Tersedia</span>
							<?php endif ?>
							</td>
						</tr>
						<tr>
							<th>Supir</th>
							<td>
							<?php if ($mobil['supir'] == '0'): ?>
								<span class="badge badge-danger">Tidak Tersedia</span>
								<?php else: ?>
								<span class="badge badge-success">Tersedia</span>
							<?php endif ?>
							</td>
						</tr>
						<tr>
							<th>Mp3_player</th>
							<td>
							<?php if ($mobil['mp3_player'] == '0'): ?>
								<span class="badge badge-danger">Tidak Tersedia</span>
								<?php else: ?>
								<span class="badge badge-success">Tersedia</span>
							<?php endif ?>
							</td>
						</tr>
						<tr>
							<th>Central_lock</th>
							<td>
							<?php if ($mobil['central_lock'] == '0'): ?>
								<span class="badge badge-danger">Tidak Tersedia</span>
								<?php else: ?>
								<span class="badge badge-success">Tersedia</span>
							<?php endif ?>
							</td>
						</tr>
						<tr>
							<th><a href="<?= base_url('customer/data_mobil'); ?>" class="btn btn-warning">Back</a></th>
							<td>
							<?php if ($mobil['status'] == '0'): ?>
								<a href="" class="btn btn-danger disable">Telah Di rental</a>
								<?php else: ?>
								<a href="<?= base_url('customer/rental/tambah_rental/' . $mobil['id_mobil']); ?>" class="btn btn-success">Rental</a>
							<?php endif ?>								
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>