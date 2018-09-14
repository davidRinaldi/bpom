
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sarana</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
<a href="#" style="text-decoration:none">Edit Data Sarana</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('sarana/update'); ?>">

						<div class="form-group">
						<label>Id Sarana : <?php echo $idsarana; ?></label>
						<input  type="hidden" name="idsarana" value="<?php echo $idsarana; ?>" required>
							</div>

					<div class="form-group">
						<label>Nama Sarana</label>
						<input class="form-control" name="namasarana" value="<?php echo $namasarana; ?>">
					</div>

					<div class="form-group">
					<label>Alamat</label>
					<input class="form-control" name="alamat" value="<?php echo $alamat; ?>">
					</div>

					<div class="form-group">
						<label>Nama Pemilik</label>
						<input class="form-control" name="namapemilik" value="<?php echo $namapemilik; ?>">
					</div>

					<div class="form-group">
						<label>Jenis Sarana</label>
						<?php echo form_dropdown('idjenissarana',$dd_jenissarana, $idjenissarana, ' id="idjenissarana" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Kab / Kota </label>
						<?php echo form_dropdown('idkabkota',$dd_kabkota, $idkabkota, ' id="idkabkota" required class="form-control"');?>
					</div>

						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?php echo base_url();?>sarana/sarana_list"  class="btn btn-default">Batal</a>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
