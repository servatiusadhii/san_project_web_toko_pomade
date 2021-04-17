<div class="container-fluid">

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?php echo base_url('assets/img/banner11.jpg') ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?php echo base_url('assets/img/banner12.jpg') ?>" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


<br><h4 class="mb-3 text-center">Video Tutorial Pemilihan Pomade - Tips and Trick Menggunakannya Sebelum Membeli Pomade</h4>
<iframe width="560" height="315" src="https://www.youtube.com/embed/EiFzMtwZYY0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


<iframe width="560" height="315" class="float-right" src="https://www.youtube.com/embed/t6fB7Y29HoE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

	<div class="row text-center mt-4">

		<?php foreach ($barang as $brg) : ?>

			<div class="card ml-3 mb-3" style="width: 16rem;">
				<img src="<?= base_url('/uploads/') . $brg->gambar ?>" class="card-img-top" alt="gambar-loading">
				<div class="card-body">
					<h5 class="card-title mb-1 font-weight-bold "><?php echo $brg->nama_brg ?></h5>
					<small><?php echo $brg->keterangan ?></small><br>
					<span class="badge badge-success my-3 py-2 ">Rp. <?php echo number_format($brg->harga), '' ?></span><br>
					<?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
					<?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-warning">Detail</div>') ?>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</div>