
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
<a href="#" style="text-decoration:none">Tambah Edit User</a></div>
					<div class="panel-body">

					<div class="col-md-6">
					<form method="post" action="<?php echo site_url('user/update'); ?>">

					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="passwordlama" value="<?php echo $passwordlama; ?>">

					<div class="form-group">
						<label>Nip</label>
						<input class="form-control" name="nip" value="<?php echo $nip; ?>">
					</div>

					<div class="form-group">
						<label>Nama Petugas</label>
						<input class="form-control" name="nama" value="<?php echo $nama; ?>">
					</div>

					<div class="form-group">
						<label>Email Petugas</label>
						<input class="form-control" name="email" value="<?php echo $email; ?>">
					</div>

					<div class="form-group">
						<label>Level</label>
						<?php echo form_dropdown('id_level',$dd_level, $id_level, ' id="id_level" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" value="<?php echo $username ?>">
					</div>

					<div class="form-group">
						<label>Password (Isi jika inggin mengganti password)</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
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
