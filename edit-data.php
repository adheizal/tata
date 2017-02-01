<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<?php
		include("navbar.php");
	?>
</head>
<body>
	<?php
		$id = $_GET['id'];
		include("koneksi.php");

		if ($ldap_con) {
		    // bind with appropriate dn to give update access
		    $cari = "(cn='$id')";
		    $data = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
		    $hasil = ldap_get_entries($ldap_con, $cari);  
		}
	?>
	<div class="container">
	<h1>Tambah Data</h1></br>
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<form action="tambah-data-proses.php" method="POST">
					<table class="table table-striped">
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input type="text" name="user_name" class="form-control" value="<?php echo $hasil['cn'][0]; ?>" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="Password" name="sandi" class="form-control" required=""></td>
						</tr>
						<tr>
							<td><input type="submit" name="tambah" value="tambah"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>