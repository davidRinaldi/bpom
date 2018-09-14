



		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Sarana</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> </use>
<a href="<?php echo base_url();?>sarana/add" style="text-decoration:none">Tambah Sarana</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px">No</th>
						        <th data-field="namasarana" data-sortable="true">Nama Sarana</th>
						        <th data-field="alamat" data-sortable="true">Alamat</th>
										<th data-field="np" data-sortable="true">Nama Pemilik</th>
										<th data-field="jenissarana" data-sortable="true">Jenis Sarana</th>
						        <th data-field="kabkota" data-sortable="true">Kab/Kota</th>
						        <th>Aksi</th>
						    </tr>
                            </thead>
                            <tbody>
                           <?php $no = 0; foreach($datasarana as $row) : $no++;?>
						     <tr>
						        <td><?php echo $no;?></td>
										<td><?php
										echo $row->namasarana;?></td>
						        <td><?php echo $row->alamat;?></td>
										 <td><?php
										 echo $row->namapemilik;?></td>
										 <td><?php
										 echo $row->namajenissarana;?></td>
										 <td><?php
										 echo $row->namakabkota;?></td>
						        <td>
<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>sarana/edit/<?php echo $row->idsarana;?>"><span class="glyphicon glyphicon-edit" ></span></a>
<?php
$a="<a data-toggle='modal'  title='Hapus Kontak' class='hapus btn btn-danger btn-xs' href='#modKonfirmasi' data-id='$row->idsarana'> <span class='glyphicon glyphicon-trash'></span></a>";
if ($idjabatan==1)
{
	echo $a;
}
?>
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
