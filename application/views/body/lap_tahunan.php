
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
										<h3><b>Laporan Pemeriksaan Tahun <?php
										echo $thn; ?> <b></h3>
									</td>
								</tr>
							</table>

							<table align="center" border="1" width="100%">
								<thead>
								<tr>
										<th rowspan="2"><b>No</b></th>
										<th rowspan="2"><b>Jenis Sarana</b></th>
										<th colspan="2"><b>Inisial Pemeriksaan</b></th>
										<th rowspan="2"><b>Total Diperksa</b></th>
								</tr>
								<tr>
										<th ><b> MK </b></th>
										<th ><b> TMK </b></th>
								</tr>
								</thead>
								<tbody>
		 <tr>
			 <td>1</td>
			 <td>Gudang Farmasi</td>
			 <td><?php echo $mkgudangfarmasi;?></td>
			 <td><?php echo $tmkgudangfarmasi;?></td>
			 <td><?php echo $tgudangfarmasi;?></td>
	 </tr>
	 <tr>
		 <td>2</td>
		 <td>RUMAH SAKIT</td>
		 <td><?php echo $mkrs;?></td>
		 <td><?php echo $tmkrs;?></td>
		 <td><?php echo $trs;?></td>
 </tr>

 <tr>
	 <td>3</td>
	 <td>PUSKESMAS</td>
	 <td><?php echo $mkps;?></td>
	 <td><?php echo $tmkps;?></td>
	 <td><?php echo $tps;?></td>
</tr>

<tr>
	<td>4</td>
	<td>KLINIK</td>
	<td><?php echo $mkkl;?></td>
	<td><?php echo $tmkkl;?></td>
	<td><?php echo $tkl;?></td>
</tr>
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
