<h3 class="text-danger text-center">Laporan Transaksi Rental Mobil</h3>
<table>
	<tr>
		<td>Dari Tanggal</td>
		<td>:</td>
		<td><?= date('d/M/Y', strtotime($_GET['dari'])) ?></td>
	</tr>
	<tr>
		<td>Sampai Tanggal</td>
		<td>:</td>
		<td><?= date('d/M/Y', strtotime($_GET['sampai'])) ?></td>
	</tr>
</table>

<table class="table table-bordered table-striped table-hover">
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
</table>

<script>
	window.print();
</script>