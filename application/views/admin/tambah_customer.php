<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Customer</h1>
		</div>
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<form action="" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama</label>
								<?php if (form_error('nama')): ?>
									<input type="text" name="nama" class="form-control is-invalid">
								<?php else: ?>
									<input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
								<?php endif ?>
								<?= form_error('nama','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Email</label>
								<?php if (form_error('email')): ?>
									<input type="email" name="email" class="form-control is-invalid">
								<?php else: ?>
									<input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
								<?php endif ?>
								<?= form_error('email','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" value="L">
									<label class="form-check-label">Laki - Laki</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" value="P">
									<label class="form-check-label">Perempuan</label>
								</div>
								<?= form_error('gender','<small class="text-danger">','</small>') ?>
							</div>	
							<div class="form-group">
								<label>No Telepon</label>
								<?php if (form_error('tlp')): ?>
									<input type="text" name="tlp" class="form-control is-invalid">
								<?php else: ?>
									<input type="text" name="tlp" class="form-control" value="<?= set_value('tlp') ?>">
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
									<input type="text" name="ktp" class="form-control" value="<?= set_value('ktp') ?>">
								<?php endif ?>
								<?= form_error('ktp','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Password</label>
								<?php if (form_error('password1')): ?>
										<input type="password" name="password1" class="form-control is-invalid">
									<?php else: ?>
										<input type="password" name="password1" class="form-control">
								<?php endif ?>
								<?= form_error('password1','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Konfirmasi Password</label>
								<?php if (form_error('password2')): ?>
										<input type="password" name="password2" class="form-control is-invalid">
									<?php else: ?>
										<input type="password" name="password2" class="form-control" >
								<?php endif ?>
								<?= form_error('password2','<small class="text-danger">','</small>') ?>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<?php if (form_error('alamat')): ?>
										<textarea class="form-control is-invalid" name="alamat"></textarea>
									<?php else: ?>
										<textarea class="form-control" name="alamat"><?= set_value('alamat') ?></textarea>
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