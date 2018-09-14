
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Kegiatan</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked calendar"><use xlink:href="#stroked-pen-tip"></use></svg>
<a href="#" style="text-decoration:none">Edit Data Kegiatan</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('kegiatan/update'); ?>">

					<div class="form-group">
					<label>Id Kegiatan</label>
					<input class="form-control" name="kode_instansiview" value="<?php echo $idkegiatan ?>" disabled>
					<input type="hidden"name="idkegiatan" value="<?php echo $idkegiatan ?>">
					</div>

					<div class="form-group">
						<label>Nama Kegiatan</label>
						<input class="form-control" name="namakegiatan" value="<?php echo $namakegiatan ?>" required>

					<div class="form-group">
						<label>Keterangan</label>
						<input class="form-control" name="keterangan" value="<?php echo $keterangan ?>" required>
					</div>

					<button type="submit" class="btn btn-primary">Update</button>
					<a href="<?php echo base_url();?>kegiatan/kegiatan_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
