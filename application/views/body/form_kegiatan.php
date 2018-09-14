
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
<a href="#" style="text-decoration:none">Tambah Data Kegiatan</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('kegiatan/save'); ?>">

					<div class="form-group">
					<label>Nama Kegiatan</label>
					<input class="form-control" name="namakegiatan" placeholder="Nama Kegiatan" required>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input class="form-control" name="keterangan" placeholder="Keterangan" required>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>kegiatan/kegiatan_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
