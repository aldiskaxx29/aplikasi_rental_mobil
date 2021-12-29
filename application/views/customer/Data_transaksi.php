<div class="container">
	<div class="card" style="margin-top:200px;">
		<div class="card-header">
			Data Transaksi
		</div>
		<?= $this->session->flashdata('trans') ?>
		<div class="card-body">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>No</th>
					<th>Nama Customer</th>
					<th>Merk Mobil</th>
					<th>No Plat</th>
					<th>Harga Sewa</th>
					<th>Action</th>
					<th>Batal</th>
				</tr>
		<?php if (empty($transaksi)): ?>
			<div class="alert alert-danger">Transaksi Tidak ada Silahkan Rental Mobil</div>
		<?php endif ?>
			<?php $i=1; ?>
			<?php foreach ($transaksi as $t): ?>				
				<tr>
					<td><?= $i; ?></td>
					<td><?= $t->nama ?></td>
					<td><?= $t->merk ?></td>
					<td><?= $t->no_plat ?></td>
					<td>Rp. <?= number_format($t->harga); ?></td>
					<td>
						<?php if ($t->status_rental == 'Kembali'): ?>
							<button type="" class="btn btn-sm btn-danger">Rental Selesai</button>
							<?php else: ?>
							<a href="<?= base_url('customer/transaksi/pembayaran/' .$t->id_rental) ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
						<?php endif ?>
					</td>
					<td>
						<?php if ($t->status_rental == 'Kembali'): ?>
							<button type="button" class="btn btn-sm btn-danger" onclick="return alert('Rental Sudah Selesai.')">Batal</button>
							<?php else: ?>
								<a href="<?= base_url('customer/transaksi/batal_transaksi/' .$t->id_rental) ?>" class="btn btn-sm btn-danger">Batal</a>
						<?php endif ?>
					</td>
				</tr>
			<?php $i++; ?>
			<?php endforeach ?>
			</table>
		</div>
	</div>
</div>