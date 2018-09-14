
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
<a href="#" style="text-decoration:none">Tambah Data Sarana</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('sarana/save'); ?>">

					<div class="form-group">
						<label>Nama Sarana</label>
						<input class="form-control" name="namasarana" placeholder="Nama Sarana">
					</div>

					<div class="form-group">
					<label>Alamat</label>
					<input class="form-control" name="alamat" placeholder="Alamat">
					</div>

					<div class="form-group">
						<label>Nama Pemilik</label>
						<input class="form-control" name="namapemilik" placeholder="Nama Pemilik">
					</div>

					<div class="form-group">
						<label>Jenis Sarana</label>
						<?php echo form_dropdown('idjenissarana',$dd_jenissarana, $idjenissarana, 'id="select-sarana" class="form-control"   required');?>
					</div>

					<div class="form-group">
						<label>Kab / Kota </label>
						<?php echo form_dropdown('idkabkota',$dd_kabkota, $idkabkota, 'id="select-kota" class="form-control" required');?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?php echo base_url();?>sarana/sarana_list"  class="btn btn-default">Batal</a>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
		<script type="text/javascript">
		$(document).ready(function(){
			$('#select-sarana').select2();
		});
		$(document).ready(function(){
			$('#select-kota').select2();
		});
		</script>
