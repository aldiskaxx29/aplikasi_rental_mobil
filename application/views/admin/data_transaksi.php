<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>	
		</div>
		<div class="section-body" style="overflow-x: auto;">
			<?= $this->session->flashdata('trans') ?>
			<table class="table table-bordered table-striped table-hover" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Customer</th>
						<th>Mobil</th>
						<th>Tgl. Rental</th>
						<th>Tgl. Kembali</th>
						<th>Harga/Hari</th>
						<th>Denda/hari</th>
						<th>Total Denda</th>
						<th>Tgl. Dikembalikan</th>
						<th>Status Pengambilan</th>
						<th>Status Rental</th>
						<th>Bukti Pembayaran</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
				<?php foreach ($transaksi as $t): ?>
					<tr>
						<td style="width:5%;"><?= $i; ?></td>
						<td><?= $t->nama; ?></td>
						<td><?= $t->merk; ?></td>
						<td><?= date('d/m/Y', strtotime($t->tanggal_rental)); ?></td>
						<td><?= date('d/m/y', strtotime($t->tanggal_kembali)); ?></td>
						<td><?= number_format($t->harga); ?></td> 
						<td><?= number_format($t->denda); ?></td>
						<td>
							<?php if ($t->total_denda == ''): ?>
								<small>Tidak Ada Denda</small>
							<?php else: ?>
								Rp. <?= number_format($t->total_denda,0,',','.') ?>
							<?php endif ?>
								
							</td>
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
						<td>
							 <?php if ($t->status_pengembalian == '1'): ?>
							 		<small class="badge badge-success">Selesai</small>
							 	<?php else: ?>
							 		<small class="badge badge-danger">Belum Selesai</small>
							 <?php endif ?>
						</td>
						<td>
							 <?php if ($t->status_rental == '1'): ?>
							 		<small class="badge badge-success">Kembai</small>
							 	<?php else: ?>
							 		<small class="badge badge-danger">Belum Kembali</small>
							 <?php endif ?>
						</td>
						<td>
							<center>
								<?php if (empty($t->bukti_pembayaran)): ?>
									<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></button>
									<?php else: ?>
										<a href="<?= base_url('admin/data_transaksi/pembayaran/' .$t->id_rental) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
								<?php endif ?>
							</center>
						</td>
						<td>
							<?php if ($t->status == '1'): ?>
									
								<?php else: ?>
									<div class="row">
										<a href="<?= base_url('admin/data_transaksi/transaksi_selesai/' .$t->id_rental); ?>" class="btn btn-sm btn-info"><i class="fa fa-check"></i></a>
										<a href="<?= base_url('admin/data_transaksi/transaksi_batal/' .$t->id_rental); ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
									</div>
							<?php endif ?>
						</td>
					</tr>		
					<?php $i++; ?>			
				<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</section>
</div>