<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title ?></h1>	
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
					</form>
				</div>
			</div>
		</div>
	</section>
</div>