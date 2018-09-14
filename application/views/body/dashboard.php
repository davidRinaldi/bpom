
<div class="row">
<ol class="breadcrumb">
	<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
	<li class="active">dashboard</li>
</ol>
</div><!--/.row-->

<br>


<div class="row">

	<div class="col-xs-12 col-md-12">


		<div class="panel panel-default chat">
			<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Informasi Pemeriksaan</div>

			<div class="panel-body">

				<?php $no = 0;
				foreach($listData as $key => $value) : $no++;?>
	            <div class="row">
	              <div class="col-md-9">
									<p> No : <?php echo $no;?> &nbsp; <br/>Tanggal : <?php
									$t=$value['tglpemeriksaan'];
									$tanggal = date('d-m-Y', strtotime($t));
									echo $tanggal;?></p><br />
									<br /><p>No Surat Tugas : <?php echo  $value['nosurattugas'];?></p><br />
	                <br /><p>Kegiatan : <?php echo $value['namakegiatan'];?></p><br />
									<br /><p>Kota : <?php echo $value['namakabkota'];?></p><br />
									Nama Petugas Pelaksana :<br />
									<?php foreach ($value['detail'] as $key2 => $value2): ?>
									<?php echo $value2['nip'] ?> - <?php echo $value2['nama'] ?> <br /><?php endforeach;?>
	              </div>
							</div>
							<hr />
						<?php endforeach;?>
	</div>
</div>
</div><!--/.row-->
