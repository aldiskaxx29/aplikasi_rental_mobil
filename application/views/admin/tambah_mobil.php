<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Mobil</h1>	
		</div>
		<div class="card">
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Kode Type</label>
								<select class="form-control" name="kode">
									<option>-- Pilihan --</option>
									<?php foreach ($type as $t): ?>
										<option value="<?= $t->kode_type ?>"><?= $t->kode_type ?></option>
									<?php endforeach ?>
									<?= form_error('kode','<small class="text-danger">','</small>') ?>
								</select>
							</div>
							<div class="form-group">
								<label>Merk</label>
								<?php if (form_error('merk')): ?>
									<input type="text" name="merk" class="form-control is-invalid">
									<?= form_error('merk','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="merk" class="form-control" value="<?= set_value('merk') ?>">
								<?php endif ?>																
							</div>
							<div class="form-group">
								<label>No Plat</label>
								<?php if (form_error('plat')): ?>
									<input type="text" name="plat" class="form-control is-invalid">
									<?= form_error('plat','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="plat" class="form-control" value="<?= set_value('plat') ?>">	
								<?php endif ?>														
							</div>			
							<div class="form-group">
								<label>Warna</label>
								<?php if (form_error('warna')): ?>
									<input type="text" name="warna" class="form-control is-invalid">
									<?= form_error('warna','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="warna" class="form-control" value="<?= set_value('warna') ?>">
								<?php endif ?>																
							</div>	
							<div class="form-group">
								<label>Tahun</label>
								<?php if (form_error('tahun')): ?>
									<input type="text" name="tahun" class="form-control is-invalid">
									<?= form_error('tahun','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="tahun" class="form-control" value="<?= set_value('tahun') ?>">
								<?php endif ?>																
							</div>
							<div class="form-group">
								<label>Status</label>
								<?php if (form_error('status')): ?>
									<input type="text" name="status" class="form-control is-invalid">
									<?= form_error('status','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="status" class="form-control" value="<?= set_value('status') ?>">	
								<?php endif ?>																
							</div>			
							<div class="form-group">
								<label>Gambar</label>
								<input type="file" name="image" class="form-control">
								<small class="text-danger">Wajib Di isi</small>
							</div>		
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga</label>
								<?php if (form_error('harga')): ?>
									<input type="text" name="harga" class="form-control is-invalid">
									<?= form_error('harga','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="harga" class="form-control" value="<?= set_value('harga') ?>">
								<?php endif ?>																
							</div>
							<div class="form-group">
								<label>Denda</label>
								<?php if (form_error('denda')): ?>
									<input type="text" name="denda" class="form-control is-invalid">
									<?= form_error('denda','<small class="text-danger">','</small>') ?>
								<?php else: ?>
									<input type="text" name="denda" class="form-control" value="<?= set_value('denda') ?>">	
								<?php endif ?>																
							</div>	
							<div class="form-group">
								<label>Ac</label>
								<select class="form-control" name="ac">
									<option>-- Pilihan --</option>
									<option value="1">Tersedia</option>
									<option value="0">Tidak Tersedia</option>
								</select>	
								<?= form_error('ac','<small class="text-danger">','</small>') ?>														
							</div>
							<div class="form-group">
								<label>Supir</label>
								<select class="form-control" name="supir">
									<option>-- Pilihan --</option>
									<option value="1">Tersedia</option>
									<option value="0">Tidak Tersedia</option>
								</select>	
								<?= form_error('supir','<small class="text-danger">','</small>') ?>																
							</div>	
							<div class="form-group">
								<label>Mp3 Player</label>
								<select class="form-control" name="mp3">
									<option>-- Pilihan --</option>
									<option value="1">Tersedia</option>
									<option value="0">Tidak Tersedia</option>
								</select>	
								<?= form_error('mp3','<small class="text-danger">','</small>') ?>																
							</div>
							<div class="form-group">
								<label>Central Lock</label>
								<select class="form-control" name="central">
									<option>-- Pilihan --</option>
									<option value="1">Tersedia</option>
									<option value="0">Tidak Tersedia</option>
								</select>	
								<?= form_error('central','<small class="text-danger">','</small>') ?>																
							</div>									
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?= base_url('admin/data_mobil') ?>" class="btn btn-info">Back</a>
				</form>
			</div>			
		</div>

	</section>
</div>