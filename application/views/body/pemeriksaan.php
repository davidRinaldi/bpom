		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Pemeriksaan</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"<svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
<a href="<?php echo base_url();?>pemeriksaan/add" style="text-decoration:none">Tambah Pemeriksaan</a></div>
					<div class="panel-body">
						<?php //echo print_r($listData); ?>
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px">No</th>
						        <th data-field="nosurattugas" data-sortable="true">No Surat Tugas</th>
						        <th data-field="namakegiatan" data-sortable="true">Nama Kegiatan</th>
										<th data-field="tglpelaksanaan" data-sortable="true">Tgl Pemeriksaan</th>
										<th data-field="kabkota" data-sortable="true">Kab / Kota</th>
										<th data-field="tglsurattugas" data-sortable="true">Tgl Surat Tugas</th>
										<th data-field="petugaspemeriksa" data-sortable="true">Petugas Pemeriksa</th>						    </tr>
                            </thead>
                            <tbody>
                           <?php $no = 0;
													 foreach($listData as $key => $value) : $no++;?>
						     <tr>
						        <td rowspan="<?php echo $value['count']+1 ?>"><?php echo $no;?></td>
										<td rowspan="<?php echo $value['count']+1 ?>"><?php
										echo $value['nosurattugas'];?></td>
						        <td rowspan="<?php echo $value['count']+1 ?>"><?php echo $value['namakegiatan'];?></td>
										 <td rowspan="<?php echo $value['count']+1 ?>"><?php
	 									$t=$value['tglpemeriksaan'];
	 									$tanggal = date('d-m-Y', strtotime($t));
	 									echo $tanggal;?></td>
										 <td rowspan="<?php echo $value['count']+1 ?>"><?php
										 echo $value['namakabkota'];?></td>
										 <td rowspan="<?php echo $value['count']+1 ?>"><?php
	 									$t=$value['tglsurattugas'];
	 									$tanggal = date('d-m-Y', strtotime($t));
	 									echo $tanggal;?>
										<td rowspan="<?php echo $value['count']+1 ?>">
										<?php foreach ($value['detail'] as $key2 => $value2){ ?>
											<?php echo $value2['nip'] ?> - <?php echo $value2['nama'] ?> <br /><?php };?>
										</td>
						    </tr>
								<?php endforeach;?>
						    </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<?php echo $this->session->flashdata("msg");?>


						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';

						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });

						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>

						<?php $this->load->view('konfirmasi');?>

<script type="text/javascript">
$(document).ready(function(){

$(".hapus").click(function(){
var id = $(this).data('id');

$(".modal-body #mod").text(id);

});

});
</script>



					</div>
				</div>
			</div>
		</div><!--/.row-->
