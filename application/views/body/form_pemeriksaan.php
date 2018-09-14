
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">user</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
				<a href="#" style="text-decoration:none">Tambah Pemeriksaan</a></div>
				<div class="panel-body">

					<div class="col-md-6">
						<form method="post" action="<?php echo site_url('pemeriksaan/save'); ?>">
							<div class="form-group">
								<label for="no_surat_tugas">Nomor Surat Tugas</label>
								<input type="text" name="no_surat_tugas" id="no_surat_tugas" class="form-control">
							</div>
							<div class="form-group">
								<label for="kegiatan_id">Jenis Kegiatan</label>
								<?php echo form_dropdown('kegiatan_id',$dd_kegiatan, $id_kegiatan, 'id="select-jeniskegiatan" class="form-control" required');?>
							</div>
							<div class="form-group">
								<label for="kabkota_id">Kabupaten/Kota</label>
								<?php echo form_dropdown('kabkota_id',$dd_kabkota, $id_kabkota, 'id="select-kota" class="form-control" required');?>
							</div>
							<div class="form-group">
								<label for="tgl_surat_tugas">Tanggal Surat Tugas</label>
								<input type="text" name="tgl_surat_tugas" id="tgl_surat_tugas" class="form-control tanggal">
							</div>
							<div class="form-group">
								<label for="tgl_periksa">Tanggal Pemeriksaan</label>
								<input type="text" name="tgl_periksa" id="tgl_periksa" class="form-control tanggal">
							</div><hr>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<?php echo form_dropdown('petugas_id',$dd_petugas, $id_petugas, 'id="petugas_id" class="form-control" required');?>
									</div>
								</div>
								<div class="col-md-4">
									<button type="button" class="btn btn-success" id="tambh-petugas">Tambah Petugas</button>
								</div>
							</div><hr>
							<div>
								<table class="table table-bordered table-stripped" id="tabel-list-petugas">
									<thead>
										<tr>
											<th class="text-center">ID Petugas</th>
											<th class="text-center">Data Petugas</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div><hr>
							<div class="form-group">
								<label for=""></label>
							</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?php echo base_url();?>pemeriksaan/pemeriksaan_list"  class="btn btn-default">Batal</a>
						</form>
					</div>


				</div>
			</div>
		</div>
	</div><!--/.row-->

	<script type="text/javascript">
		$(document).ready(function () {
			$('.tanggal').datepicker({
				format: "yyyy-mm-dd",
				autoclose:true
			});

			$('#tambh-petugas').on('click', function(){
				var id_petugas = $('#petugas_id').val();
				var data_petugas = $('#petugas_id').find('option:selected').text();
				var tabel = $('#tabel-list-petugas > tbody');

				tabel.append("<tr><td class='text-center'><input type='text' size='2' name='petugas_id[]' value='"+id_petugas+"' readonly></td><td class='text-center'>"+data_petugas+"</td></tr>")
			});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#select-jeniskegiatan').select2();
	});
	$(document).ready(function(){
		$('#select-kota').select2();
	});
	</script>
