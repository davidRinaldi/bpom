		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Hasil Periksa</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
						<a href="<?php echo base_url();?>hasilperiksa/add" style="text-decoration:none">Tambah Hasil Pemeriksaan</a>
						</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px">No</th>
						        <th data-field="nosurat" data-sortable="true">No Surat Tugas</th>
						        <th data-field="namakegiatan" data-sortable="true">Nama Kegiatan</th>
										<th data-field="namasarana" data-sortable="true">Nama sarana</th>
										<th data-field="np" data-sortable="true">Nama Pemilik</th>
										<th data-field="jenissarana" data-sortable="true">Jenis Sarana</th>
						        <th data-field="kabkota" data-sortable="true">Kab/Kota</th>
										<th data-field="hp" data-sortable="true">Hasil Pemeriksaan</th>
										<th data-field="ket" data-sortable="true">Keterangan</th>
										<th data-field="tglpelaporan" data-sortable="true">Tanggal Pelaporan</th>
										<th data-field="fot" data-sortable="true">Foto Dokumentasi</th>
						    </tr>
                            </thead>
                            <tbody>
                           <?php $no = 0; foreach($datahasilperiksa as $row) : $no++;?>
						     <tr>
						        <td><?php echo $no;?></td>
										<td><?php
										echo $row->nosurattugas;?></td>
						        <td><?php echo $row->namakegiatan;?></td>
										<td><?php echo $row->namasarana;?></td>
										 <td><?php
										 echo $row->namapemilik;?></td>
										 <td><?php
										 echo $row->namajenissarana;?></td>
										 <td><?php
										 echo $row->namakabkota;?></td>
										 <td><?php
										 echo $row->hasil;?></td>
										 <td><?php
										 echo $row->keterangan;?></td>
										 <td><?php
										  $format = date('d-m-Y', strtotime($row->tglinput)); echo $format; ?></td>
											<td ><img src="<?php echo base_url(); ?>assets/dokpemeriksaan/<?php echo $row->foto; ?>" width="50" height="50" /></td>
							        <td>
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
