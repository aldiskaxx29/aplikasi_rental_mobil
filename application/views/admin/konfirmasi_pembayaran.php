<div class="main-content">
	<section class="section">
		<di class="section-header">
			<h1><?= $title ?></h1>
		</di>
		<div class="section-body">
			<div class="card" style="width:55%;">
				<div class="card-header">
					Konfirmasi Pembayaran
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/data_transaksi/cek_pembayaran') ?>" method="post">
						<?php foreach ($pembayaran as $pm): ?>
							<a href="<?= base_url('admin/data_transaksi/download_pembayaran/' .$pm->id_rental) ?>" class="btn btn-sm btn-success">Download Bukti Pembayaran</a>

								<div class="custom-control custom-switch ml-3">
									<input type="hidden" value="<?= $pm->id_rental ?>" name="id_rental">
									<input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
									<label class="custom-control-label" for="customSwitch1">Konfirmasi Pembayarann</label>
								</div>								
								<hr>
								<button type="submit" class="btn btn-sm btn-primary">Simapan</button>

						<?php endforeach ?>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>