<?php  ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ubah Mobil</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Kode Type</label>
								<input type="hidden" name="id" class="form-control" value="<?= $mobil['id_mobil']; ?>">
								<input type="text" name="kode" class="form-control" value="<?= $mobil['kode_type']; ?>" readonly>
								<?= form_error('kode','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Merk</label>
								<input type="text" name="merk" class="form-control" value="<?= $mobil['merk']; ?>">
								<?= form_error('merk','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>No Plat</label>
								<input type="text" name="plat" class="form-control" value="<?= $mobil['no_plat']; ?>">
								<?= form_error('plat','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Warna</label>
								<input type="text" name="warna" class="form-control" value="<?= $mobil['warna']; ?>">
								<?= form_error('warna','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Tahun</label>
								<input type="text" name="tahun" class="form-control" value="<?= $mobil['tahun']; ?>">
								<?= form_error('tahun','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Status</label>
								<input type="text" name="status" class="form-control" value="<?= $mobil['status']; ?>">
								<?= form_error('status','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Gambar</label><br>
								<img src="<?= base_url('assets/assets_admin/foto/') .$mobil['gambar'];?>" width="100">
							</div>
							<div class="form-group">
								<input type="file" name="image" class="form-control">
								<small class="text-danger">Biarkan jika tidak ingin diubah</small>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga</label>
								<?php if (form_error('harga')): ?>
									<input type="text" name="harga" class="form-control is-invalid">
									<?= form_error('harga','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="harga" class="form-control" value="<?= $mobil['harga']; ?>">
								<?php endif ?>																
							</div>
							<div class="form-group">
								<label>Denda</label>
								<?php if (form_error('denda')): ?>
									<input type="text" name="denda" class="form-control is-invalid">
									<?= form_error('denda','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="denda" class="form-control" value="<?= $mobil['denda'];?>">	
								<?php endif ?>																
							</div>	
							<div class="form-group">
								<label>Ac</label>
								<select class="form-control" name="ac">
									<?php foreach ($Ta as $t): ?>
										<?php if ($mobil['ac'] == $t): ?>
											<option value="<?= $t ?>"selected><?= $t ?></option>
										<?php else: ?>
											<option value="<?= $t ?>"><?= $t ?></option>
										<?php endif ?>
									<?php endforeach ?>	
								</select>	
								<?= form_error('ac','<small class="text-danger">','</small>') ?>														
							</div>
							<div class="form-group">
								<label>Supir</label>
								<select class="form-control" name="supir">
									<?php foreach ($Ta as $t): ?>
										<?php if ($mobil['supir'] == $t): ?>
											<option value="<?= $t ?>"selected><?= $t ?></option>
										<?php else: ?>
											<option value="<?= $t ?>"><?= $t ?></option>
										<?php endif ?>
									<?php endforeach ?>									
								</select>	
								<?= form_error('supir','<small class="text-danger">','</small>') ?>																
							</div>	
							<div class="form-group">
								<label>Mp3 Player</label>
								<select class="form-control" name="mp3">
									<?php foreach ($Ta as $t): ?>
										<?php if ($mobil['mp3_player'] == $t): ?>
											<option value="<?= $t ?>"selected><?= $t ?></option>
										<?php else: ?>
											<option value="<?= $t ?>"><?= $t ?></option>
										<?php endif ?>
									<?php endforeach ?>	
								</select>	
								<?= form_error('mp3','<small class="text-danger">','</small>') ?>																
							</div>
							<div class="form-group">
								<label>Central Lock</label>
								<select class="form-control" name="central">
									<?php foreach ($Ta as $t): ?>
										<?php if ($mobil['central_lock'] == $t): ?>
											<option value="<?= $t ?>"selected><?= $t ?></option>
										<?php else: ?>
											<option value="<?= $t ?>"><?= $t ?></option>
										<?php endif ?>
									<?php endforeach ?>	
								</select>	
								<?= form_error('central','<small class="text-danger">','</small>') ?>																
							</div>									
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?= base_url('admin/data_mobil') ?>" class="btn btn-warning">Back</a>
				</form>
			</div>
		</div>
	</section>
</div>