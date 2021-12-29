<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tampil Laporan</h1>	
		</div>
		<div class="sectio-body">
			<div class="card">
				<div class="card-body">
					<form accept="" method="post">	
						<div class="form-group">
							<label>Dari Tanggal</label>
							<input type="date" name="dari" class="form-control">
							<?= form_error('dari','<small class="text-danger">','</small>') ?>
						</div>
						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="date" name="sampai" class="form-control">
							<?= form_error('sampai','<small class="text-danger">','</small>') ?>
						</div>
						<button type="submit" class="btn btn-primary">Cari</button>
					</form><hr>

					<div class="btn-group mb-2">
						<a href="<?= base_url().'admin/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i>Print</a>
					</div>

			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Customer</th>
						<th>Mobil</th>
						<th>Tgl. Rental</th>
						<th>Tgl. Kembali</th>
						<th>Harga/Hari</th>
						<th>Denfa/hari</th>
						<th>Total Denda</th>
						<th>Tgl. Dikembalikan</th>
						<th>Status Pengambilan</th>
						<th>Status Rental</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($laporan)): ?>
						<div class="alert alert-danger"><b>Data Tidak Di Temukan</b></div>
					<?php endif ?>
					<?php $i=1; ?>
				<?php foreach ($laporan as $t): ?>
					<tr>
						<td style="width:5%;"><?= $i; ?></td>
						<td><?= $t->nama; ?></td>
						<td><?= $t->merk; ?></td>
						<td><?= date('d/m/Y', strtotime($t->tanggal_rental)); ?></td>
						<td><?= date('d/m/y', strtotime($t->tanggal_kembali)); ?></td>
						<td><?= number_format($t->harga); ?></td> 
						<td><?= number_format($t->denda); ?></td>
						<td>Rp. <?= number_format($t->total_denda,0,',','.') ?></td>
						<td>
							<?php 
								if ($t->tanggal_pengembalian == '0000-00-00'){
									echo "-";
								}
								else{
									echo date('d/m/Y', strtotime($t->tanggal_pengembalian));
								}
							?>
						</td>
						<td><?= $t->status_pengembalian ?></td>
						<td><?= $t->status_rental ?></td>
					</tr>		
					<?php $i++; ?>			
				<?php endforeach ?>

				</tbody>
				</table>
			</div>
				</div>
			</div>
		</div>
	</section>
</div>