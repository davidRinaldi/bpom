
<div class="row">
<ol class="breadcrumb">
	<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
	<li class="active">laporan</li>
</ol>
</div><!--/.row-->

<br>


<div class="row">

	<div class="col-xs-12 col-md-6">

		<form action="<?php echo site_url('laporan/proses_tahunan'); ?>" method="post">
		<div class="form-group">
			<label for="nama">Laporan Per Tahun : </label>
		</div>

		<div class="form-group">
			<label>Tahun</label> <br />
		<select name="thn" class="form-control">
			<option>Tahun</option>
			<?php
				$thnSkrg = date('Y');
				for($i=2016;$i<=$thnSkrg;$i++){
					echo "<option>$i</option>";
				}
			?>
		</select>
	</div>

		<br />
		<button type="submit" class="btn btn-primary">Lihat laporan</button>
	</form>

	</div>
</div><!--/.row-->
