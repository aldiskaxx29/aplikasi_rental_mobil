<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h>
		</div>
		<div class="section-body">
			<form action="<?= base_url('admin/data_transaksi/transaksi_selesai_aksi'); ?>" method="post">
				<div class="form-group">
					<label>Tanggal Pengembalian</label>
					<input type="hidden" name="id" class="form-control" value="<?= $transaksi['id_rental']; ?>">
					<input type="hidden" name="denda" class="form-control" value="<?= $transaksi['denda'] ?>">
					<input type="hidden" name="tgl_kembali" class="form-control" value="<?= $transaksi['tanggal_kembali'] ?>">
					<input type="date" name="tgl_pengembalian" class="form-control">
				</div>
				<div class="form-group">
					<label>Status Pengembalian</label>
					<select class="form-control" name="status_pengembalian">
						<option>-- Pilihan --</option>
						<option value="Selesai">Selesai</option>
						<option value="Belum selesai">Belum selesai</option>
					</select>
				</div>
				<div class="form-group">
					<label>Status Rental</label>
					<select class="form-control" name="status_rental">
						<option>-- Pilihan --</option>
						<option value="Kembali">Kembali</option>
						<option value="Belum kembali">Belum kembali</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
		</div>
	</section>
</div>