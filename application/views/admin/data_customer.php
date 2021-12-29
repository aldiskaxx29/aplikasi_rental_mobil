 btn-sm<?php  ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Customer</h1>
		</div>
		<div class="section-body" style="overflow-x: auto;">
			<?= $this->session->flashdata('customer'); ?>
			<a href="<?= base_url('admin/data_customer/tambah_customer') ?>" class="btn btn-primary">Tambah Customer</a><hr>
			<table class="table table-stripde table-bordered" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>						
						<th>Gander</th>
						<th>No Telepon</th>
						<th>No KTP</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=1; ?>
				<?php foreach ($customer as $c): ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $c->nama ?></td>
						<td><?= $c->gender ?></td>
						<td><?= $c->no_tlp ?></td>
						<td><?= $c->no_ktp ?></td>
						<td><?= $c->alamat ?></td>
						<td>
							<a href="<?= base_url('admin/data_customer/hapus_customer/') .$c->id_customer?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin DI Hapus')">Delete</a>
							<a href="<?= base_url('admin/data_customer/ubah_customer/') .$c->id_customer?>" class="btn btn-warning btn-sm">Update</a>
							<a href="<?= base_url('admin/data_customer/detail_customer/') .$c->id_customer?>" class="btn btn-info btn-sm">Detail</a>
						</td>
					</tr>			
				<?php $i++; ?>		
				<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</section>
</div>