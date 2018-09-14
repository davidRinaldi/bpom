
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>kategori/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Laporan</li>
			</ol>
		</div><!--/.row-->
	<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a onClick="PrintDoc()" class="btn btn-danger btn-lg">Print</a>
				  <div id="tabel">
					<div class="panel-body">
						<table width="100%">
					<tr>
					<td width="25" align="center">
						<img src="<?php echo base_url();?>assets/img/bpom.jpg" width="100%">
					</td>
					<td width="50" align="center">
						<h4>BALAI BESAR POM DI PADANG<br>Jln. Gajah Mada (Gunung Pangilun) - Padang, Sumatra Barat<br />Telp: 0751 - 7054280 Fax: 0751 - 7055213, Email: bbpom_padang@yahoo.com</h4>
					</td>
					<td width="25" align="center">
						&nbsp]
					</td>
				</tr>
			</table>
							<hr />
              <table border="0" align="center" with="100%">
								<tr>
									<td colspan="7">
										<h3><b>Laporan Bulanan Pemeriksaan Sarana <b></h3>
									</td>
								</tr>
							</table>
								<table border="0" align="center" width="100%">
										<tr>
											<td colspan="5">
												<span style="padding-right:47em">Laporan : Laporan Hasil Pemeriksaan Bulan <?php echo $bln;?>  Tahun <?php
												echo $thn; ?></span>
												</td>
										</tr>
								</tr>
							</table>
							<table align="center" border="1" width="100%">
								<thead>
								<tr>
									<th><b>No</b></th>
										<th><b>Tanggal Pelaporan</b></th>
										<th><b>No Surat Tugas</b></th>
										<th><b>Kegiatan</b></th>
										<th><b>Petugas Pelaksana</b></th>
										<th><b>Jenis Sarana</b></th>
										<th><b>Nama Sarana</b></th>
										<th><b>Alamat Sarana</b></th>
										<th><b>Kab/Kota</b></th>
										<th><b>Nama Pemilik</b></th>
										<th><b>Hasil Pemeriksaan</b></th>
								</tr>
								</thead>
								<tbody>
							 <?php $no = 0;
							 foreach($listData as $key => $value) : $no++;?>
							 <?php //var_dump($key);?>
		 <tr>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $no;?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php
			 		$t=$value['tglinput'];
			 		$tanggal = date('d-m-Y', strtotime($t));
			 		echo $tanggal
					;?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php
						echo $value['nosurattugas'];
					?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['namakegiatan'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php foreach ($value['detail'] as $key2 => $value2): ?>
					<?php echo $value2['nip'] ?> - <?php echo $value2['nama'] ?>
					<br />
					<?php endforeach;?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['njs'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['namasarana'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['alamat'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['namakabkota'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['namapemilik'];?>
				</td>
				<td rowspan="<?php echo $value['count']+1 ?>">
					<?php echo $value['hasil'];?>
				</td>
			</tr>
			</tbody>
			<?php endforeach;?>
		</table>
						<br /> <br /> <br />
						<table width="100%">
					<tr>
					<td width="25" align="center"></td>
					<td width="50" align="center"></td>
					<td width="25" align="center">Mengetahui, <br /> Pimpinan BBPOM di Padang <br />&nbsp<br />&nbsp<br />&nbsp<br />Drs. M.Suhendri, M.Farm. Apt</td>
				</tr>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<script type="text/javascript">
     /*--This JavaScript method for Print command--*/
     function PrintDoc() {
      var toPrint = document.getElementById('tabel');
      var popupWin = window.open('');
      popupWin.document.open();
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
      popupWin.document.write(toPrint.outerHTML);
      popupWin.document.write('</html>');
      popupWin.document.close();
     }
    </script>
