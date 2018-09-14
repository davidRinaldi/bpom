
<div class="row">
<ol class="breadcrumb">
	<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
	<li class="active">laporan</li>
</ol>
</div><!--/.row-->

<br>


<div class="row">

	<div class="col-xs-12 col-md-6">

		<form action="<?php echo site_url('laporan/pilih'); ?>" method="post">
		<div class="form-group">
			<label for="nama">Laporan : </label>
					<select class="form-control" name="ddlaporan">
						<option selected value="">-Pilih Laporan-</option>
							<option value="periode">Laporan Per Periode Hasil Pemeriksaan Sarana</option>
							<option value="bulan">Laporan Bulanan Hasil Pemeriksaan Sarana</option>
							<option value="tahun">Laporan Tahunan Hasil Pemeriksaan Sarana</option>
							<option value="petugas">Laporan Pemeriksaan Sarana Per Petugas</option>
						</select>
		</div>
		<br />
		<button type="submit" class="btn btn-primary">Lihat laporan</button>
	</form>

	</div>
</div><!--/.row-->
