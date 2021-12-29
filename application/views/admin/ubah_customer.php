<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ubah Data Customer</h1>
		</div>
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<form action="" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama</label>
								<input type="hidden" name="id" class="form-control" value="<?= $custom['id_customer'] ?>">
								<?php if (form_error('nama')): ?>
									<input type="text" name="nama" class="form-control is-invalid">
								<?php else: ?>
									<input type="text" name="nama" class="form-control" value="<?= $custom['nama'] ?>">
								<?php endif ?>
								<?= form_error('nama','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Email</label>
								<?php if (form_error('email')): ?>
									<input type="email" name="email" class="form-control is-invalid">
								<?php else: ?>
									<input type="email" name="email" class="form-control" value="<?= $custom['email'] ?>">
								<?php endif ?>
								<?= form_error('email','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<?php foreach ($jk as $j): ?>
									<?php if ($j == $custom['gender']): ?>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="gender" value="<?= $j ?>"checked>
											<label class="form-check-label"><?= $j ?></label>
										</div>
										<?php else: ?>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="gender" value="<?= $j ?>">
											<label class="form-check-label"><?= $j ?></label>
										</div>
									<?php endif ?>
								<?php endforeach ?>
									<?= form_error('gender','<small class="text-danger">','</small>') ?>
							</div>	
							<div class="form-group">
								<label>No Telepon</label>
								<?php if (form_error('tlp')): ?>
									<input type="text" name="tlp" class="form-control is-invalid">
								<?php else: ?>
									<input type="text" name="tlp" class="form-control" value="<?= $custom['no_tlp'] ?>">
								<?php endif ?>
								<?= form_error('tlp','<small class="text-danger">','</small>') ?>
							</div>						
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>No KTP</label>
								<?php if (form_error('ktp')): ?>
									<input type="text" name="ktp" class="form-control is-invalid">	
								<?php else: ?>
									<input type="text" name="ktp" class="form-control" value="<?= $custom['no_ktp'] ?>">
								<?php endif ?>
								<?= form_error('ktp','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<?php if (form_error('alamat')): ?>
										<textarea class="form-control is-invalid" name="alamat"></textarea>
									<?php else: ?>
										<textarea class="form-control" name="alamat"><?= $custom['alamat'] ?></textarea>
								<?php endif ?>
								<?= form_error('alamat','<small class="text-danger">','</small>') ?>
							</div>				
							<button type="submit" class="btn btn-primary">Save</button>			
							<a href="<?= base_url('admin/data_customer'); ?>" class="btn btn-warning">Back</a>
						</div>
					</div>
					</form>	
				</div>
				</div>
			</div>		
		</div>
	</section>
</div>