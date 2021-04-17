<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) {
					foreach ($keranjang as $item) {
						$grand_total = $grand_total + $item['subtotal'];
					}

					echo "<h4>Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');
				?>
			</div><br><br>

			<h3>Input Alamat Pengiriman dan Pembayaran</h3>

			<form action="<?php echo base_url('dashboard/proses_pesanan'); ?>" method="post">

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
					<?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
					<?php echo form_error('alamat', '<div class="text-danger small ml-2">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="no_telp" placeholder="Nomor Telepon Lengkap Anda" class="form-control">
					<?php echo form_error('no_telp', '<div class="text-danger small ml-2">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select name="kurir" class="form-control">
						<option>---</option>
						<option>JNE</option>
						<option>TIKI</option>
						<option>POS Indonesia</option>
						<option>GOJEK</option>
						<option>GRAB</option>
					</select>
					<?php echo form_error('kurir', '<div class="text-danger small ml-2">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label>Pilih BANK</label>
					<select name="bank" class="form-control">
						<option>---</option>
						<option>BCA - XXXXXXXX</option>
						<option>BNI - XXXXXXXX</option>
						<option>BRI - XXXXXXXX</option>
						<option>MANDIRI - XXXXXXXX</option>
					</select>
					<?php echo form_error('bank', '<div class="text-danger small ml-2">', '</div>'); ?>
				</div>

				<button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

			</form>

		<?php
				} else {
					echo "<h4>Keranjang Belanja Anda Masih Kosong";
				}
		?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>