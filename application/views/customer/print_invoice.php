
	<style>
		th{
			float: left;
		}
	</style>

	<h2>INVOICE PEMBAYARAN ANDA</h2>
	<table>
		<?php foreach ($invoice as $i): ?>
		<tr>
			<th>Nama Customer</th>
			<td>:</td>
			<td><?= $i->nama; ?></td>
		</tr>
		<tr>
			<th>Merk Mobil</th>
			<td>:</td>
			<td><?= $i->merk; ?></td>
		</tr>
		<tr>
			<th>Tanggal Rental</th>
			<td>:</td>
			<td><?= $i->tanggal_rental; ?></td>
		</tr>
		<tr>
			<th>Tanggal Kembali</th>
			<td>:</td>
			<td><?= $i->tanggal_kembali; ?></td>
		</tr>
		<tr>
			<th>Bayar Sewa/Hari</th>
			<td>:</td>
			<td>Rp. <?= number_format($i->harga,0,',','.'); ?></td>
		</tr>
		<tr>
			<?php 
				$x = strtotime($i->tanggal_kembali);
				$y = strtotime($i->tanggal_rental);
				$jml = abs(($x - $y)/(60*60*24));
			?>
			<th>Jumlah Hari/Sewa</th>
			<td>:</td>
			<td><?= $jml; ?> Hari</td>
		</tr>
		<tr>
			<th>Status Pembayaran</th>
			<td>:</td>
			<td>
				<?php  
					if ($i->nama == '0') {
						echo "Belum Lunas";
					}else{
						echo "Sudah Lunas";
					}
				?>
			</td>
		</tr>
		<tr>
			<th>Rekening Pembayaran</th>
			<td>:</td>
			<td>
				<ul>
					<li>Bank Bri</li>
					<li>Bank Bni</li>
					<li>Bank Mandiri</li>
				</ul>
			</td>
		</tr>
		<tr style="font-weight: bold;color:red;">
			<th>JUMLAH PEMBAYARAN</th>
			<td>:</td>
			<td>Rp. <?= number_format($i->harga * $jml,0,',','.'); ?></td>
		</tr>
			
		<?php endforeach ?>
	</table>
<script>
		window.print();
</script>
