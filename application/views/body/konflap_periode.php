
<div class="row">
<ol class="breadcrumb">
	<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
	<li class="active">laporan</li>
</ol>
</div><!--/.row-->

<br>


<div class="row">

	<div class="col-xs-12 col-md-12">

		<form action="<?php echo site_url('laporan/proses_periode'); ?>" method="post">
		<div class="form-group">
			<label for="nama">Laporan Periode : </label>
		</div>

		<div class="form-group">
			<label>Tanggal</label> <br />
			<input type="text" name="tanggal1" class="tanggal" />
		</div>

		<div class="form-group">
			<label>Sampai Tanggal </label> <br />
			<input type="text" name="tanggal2" class="tanggal" />
		</div>
		<br />
		<button type="submit" class="btn btn-primary">Lihat laporan</button>
	</form>

	</div>
</div><!--/.row-->
<script type="text/javascript">
		$(document).ready(function () {
				$('.tanggal').datepicker({
						format: "yyyy-mm-dd",
						autoclose:true
				});
		});
</script>
