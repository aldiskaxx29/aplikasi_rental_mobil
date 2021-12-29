<?php  ?>
<div class="container">
	<div class="card" style="margin-top: 200px;margin-bottom:50px;">
		<div class="card-header">
			Form Rental Mobil
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label>Harga Sewa/Hari</label>
					<input type="hidden" name="id_mobil" value="<?= $mobil['id_mobil'] ?>">
					<input type="text" name="harga" class="form-control" value="<?= $mobil['harga'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>Denda/Hari</label>
					<input type="text" name="denda" class="form-control" value="<?= $mobil['denda'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tanggal Rental</label>
					<input type="date" name="tgl_rental" class="form-control" value="<?= $mobil['denda'] ?>">
					<?= form_error('tgl_rental','<small class="text-danger">','</small>') ?>
				</div>
				<div class="form-group">
					<label>Tanggal Kembali</label>
					<input type="date" name="tgl_kembali" class="form-control" value="<?= $mobil['denda'] ?>">
				</div>
				<button type="submit" class="btn btn-primary">Rental</button>
			</form>
		</div>
	</div>
</div>