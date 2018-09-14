
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="#" style="text-decoration:none">Tambah Data User</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('user/save'); ?>">

					<div class="form-group">
						<label>Nip</label>
						<input class="form-control" name="nip" placeholder="Nip">
					</div>

					<div class="form-group">
					<label>Nama</label>
					<input class="form-control" name="nama" placeholder="Nama">
					</div>

					<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" placeholder="Email">
					</div>

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" placeholder="Username">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>


					<div class="form-group">
						<label>Jabatan</label>
						<?php echo form_dropdown('id_jabatan',$dd_jabatan, $id_jabatan, ' id="id_jabatan" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Aktif / Tidak Aktif</label>
						<?php echo form_dropdown('id_aktif',$dd_aktif, $id_aktif, ' id="id_aktif" required class="form-control"');?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>user/user_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
