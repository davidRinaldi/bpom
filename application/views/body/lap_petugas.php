
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
										<h3><b>Laporan Pemeriksaan Petugas Bulan <?php
										echo $bln; ?> <b></h3>
									</td>
								</tr>
							</table>
								<table border="0" align="center" width="100%">
									<tr>
										<td colspan="6">
											<span style="padding-right:47em">Petugas : <?php echo $namapetugas;?></span>
											</td>
									</tr>
									<tr>
										<td colspan="6">
											<span style="padding-right:47em">Nip : <?php echo $nip;?></span>
											</td>
									</tr>
										<tr>
											<td colspan="6">
												<span style="padding-right:47em">Laporan : Laporan Pemeriksaan Bulan <?php echo $bln;?></span>
												</td>
										</tr>
								</tr>
							</table>
							<table align="center" border="1" width="100%">
								<thead>
								<tr>
									<th><b>No</b></th>
										<th><b>No Surat Tugas</b></th>
										<th><b>Kegiatan</b></th>
										<th><b>Keterangan</b></th>
										<th><b>Tanggal Periksa</b></th>
										<th><b>Kab/Kota</b></th>
										<th><b>Tanggal Surattugas</b></th>
								</tr>
								</thead>
								<tbody>
							<?php $no = 0; foreach($dataperiksa_petugas as $row) : $no++;?>
		 <tr>
			 <td><?php echo $no;?></td>
			 <td><?php echo $row->nosurattugas;?></td>
			 <td><?php echo $row->namakegiatan;?></td>
			 <td><?php echo $row->keterangan;?></td>
			 <td><?php echo $row->tglpemeriksaan;?></td>
			 <td><?php echo $row->namakabkota;?></td>
			 <td><?php echo $row->tglsurattugas;?></td>
	 </tr>
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
