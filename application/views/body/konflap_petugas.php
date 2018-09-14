
<div class="row">
<ol class="breadcrumb">
	<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
	<li class="active">laporan</li>
</ol>
</div><!--/.row-->

<br>


<div class="row">

	<div class="col-xs-12 col-md-6">

		<form action="<?php echo site_url('laporan/proses_petugas'); ?>" method="post">
		<div class="form-group">
			<label for="nama">Laporan Per Petugas : </label>
		</div>

			<div class="form-group">
				<?php echo form_dropdown('petugas_id',$dd_petugas, $id_petugas, ' class="form-control" required');?>
			</div>

		<div class="form-group">
			<label>Bulan</label> <br />
			<select name="bln" class="form-control">
				<option>Bulan</option>
				<?php
					$nmBln = array('1' => "Januari",'2' => "Februari",'3' => "Maret",'4' => "April",
								'5' => "Mei",'6' => "Juni",'7' => "Juli",'8' => "Agustus",
								'9' => "September",'10' => "Oktober",'11' => "November",'12' => "Desember");
					for($i=1;$i<=12;$i++){
						echo "<option value=$i>$nmBln[$i]</option>";
					}
				?>
			</select>
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
