<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card" style="margin-top:200px;">
				<div class="card-header alert alert-success">
					Invice Pembayaran Anda
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<?php foreach ($transaksi as $t): ?>
						<tr>
							<th>Merk Mobil</th>
							<td>:</td>
							<td><?= $t->merk ?></td>
						</tr>		
						<tr>
							<th>Tanggal Rental</th>
							<td>:</td>
							<td><?= $t->tanggal_rental ?></td>
						</tr>					
						<tr>
							<th>Tanggal Kembal</th>
							<td>:</td>
							<td><?= $t->tanggal_kembali ?></td>
						</tr>
						<tr>
							<th>Biaya Sewa/Hari</th>
							<td>:</td>
							<td>Rp. <?= number_format($t->harga,0,',','.'); ?></td>
						</tr>
						<tr>
							<?php 
								$x = strtotime($t->tanggal_kembali);
								$y = strtotime($t->tanggal_rental);
								$jml = abs(($x-$y)/(60*60*24));
							 ?>
							<th>Jumlah Hari/Sewa</th>
							<td>:</td>
							<td><?= $jml ?> Hari</td>
						</tr>
						<tr class="text-syccess">
							<th>Jumlah Pembayaran</th>
							<td>:</td>
							<td><button class="btn btn-sm btn-success">Rp. <?= number_format($t->harga*$jml,0,',','.'); ?></button></td>
						</tr>
						<tr>
							<th></th>
							<td></td>
							<td><a href="<?= base_url('customer/transaksi/cetak_invoice/' .$t->id_rental); ?>" class="btn btn-warning btn-sm" target="_blank">Print Invoice</a></td>
						</tr>
						<?php endforeach ?>
						
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="margin-top: 200px;">
				<div class="card-header alert alert-info" >
					Informasi Pembayaran
				</div>
				<div class="card-body">
					<p class="text-primary">Silahkan Melakukan Pembayaran Melalu Rekening Nomor Rekening Di Bawah ini.</p>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Bank Mandiri</li>
						<li class="list-group-item">Bank BCA</li>
						<li class="list-group-item">Bank BNI</li>
						<li class="list-group-item">Bank BRI</li>
						<li class="list-group-item">Bank BUKOPIN</li>
					</ul>

					<?php if (empty($t->bukti_pembayaran)): ?>
						<button class="btn btn-danger mt-3 btn-block" type="button" data-toggle="modal" data-target="#contohModal">Upload Bukti Pembayaran</button>
					<?php elseif($t->status_pembayaran == '0'): ?>	
						<button class="btn btn-warning mt-3 btn-block" type="button"><i class="fa fa-clock"></i>Menunggu Konfirmasi</button>
					<?php elseif($t->status_pembayaran == '1'): ?>
						<button class="btn btn-success mt-3 btn-block" type="button"><i class="fa fa-check"></i> Pembayaran Selesai</button>
					<?php endif ?>
				</div>				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="contohModal" role="dialog" tabindex="-1" arialabelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim Pulti Pembayaran</h4>
                 	<button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
			<form action="<?= base_url('customer/transaksi/bukti_pembayaran'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">      
            		<div class="form-group">
            			<label>Upload Gambar</label>
            			<input type="hidden" name="id" class="form-control"  value="<?= $t->id_rental ?>">
            			<input type="file" name="bukti" class="form-control">
            		</div>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-success">Kirim</button>
            </div>
 			</form>
        </div>
    </div>

</div>
