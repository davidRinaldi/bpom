
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Hasil Pemeriksaan</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
<a href="#" style="text-decoration:none">Tambah Data Hasil Pemeriksaan</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('hasilperiksa/save'); ?>"  enctype="multipart/form-data">

					<div class="form-group">
						<label>No Surat Tugas</label>
						<?php echo form_dropdown('idpemeriksaan',$dd_pemeriksaan, $idpemeriksaan, 'id="select-surattugas" class="form-control"   required');?>
					</div>

					<div class="form-group">
						<label>Sarana </label>
						<?php echo form_dropdown('idsarana',$dd_sarana, $idsarana, 'id="select-sarana" class="form-control"   required');?>
					</div>

					<div class="form-group">
						<label>Hasil Pemeriksaan</label>
						<?php echo form_dropdown('kodehasil',$dd_hasil, $kodehasil, 'id="select-hasil" class="form-control"   required');?>
					</div>

					<div class="form-group">
					<label>Keterangan</label>
					<input class="form-control" name="keterangan" placeholder="Keterangan">
					</div>

					<div class="form-group">
					<label>Link Vidio</label>
					<input class="form-control" name="vidio" placeholder="Link Vidio">
					</div>

					<div class="form-group">
						<label>Foto (jpg|jpeg|png)</label>
						<input type="file" name="file_surat"  multiple="multiple"/>
					</div>

					<div class="form-group">
						<label>Tanggal Input : <?php echo date('d-m-Y'); ?></label>
						<input type="hidden" name="tglinput" value="<?php echo date('Y-m-d'); ?>">
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?php echo base_url();?>hasilperiksa/hasilperiksa_list"  class="btn btn-default">Batal</a>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
		<script type="text/javascript">
		$(document).ready(function(){
			$('#select-surattugas').select2();
		});
		$(document).ready(function(){
			$('#select-sarana').select2();
		});
		</script>
