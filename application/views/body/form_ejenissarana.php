
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Jenis Sarana</li>
			</ol>
		</div><!--/.row-->

	<br>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked calendar"><use xlink:href="#stroked-pen-tip"></use></svg>
<a href="#" style="text-decoration:none">Edit Data Jenis Sarana</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('jenissarana/update'); ?>">

					<div class="form-group">
					<label>Id Jenis Sarana : <?php echo $idjenissarana; ?></label>
					<input  type="hidden" name="idjenissarana" value="<?php echo $idjenissarana; ?>" required>
						</div>

					<div class="form-group">
					<label>Nama Jenis Sarana</label>
					<input class="form-control" name="namajenissarana" value="<?php echo $namajenissarana; ?>" required>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>jenissarana/jenissarana_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
