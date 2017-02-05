<?php
	if (isset($_POST['tambah'])) {
		include ("koneksi.php");

		$user_name = $_POST['user_name'];
		$sandi	= $_POST['sandi'];
	   

	    // prepare data
	    $info["cn"] = $user_name;
	    $info["sn"] = $user_name;
	    $info["objectclass"][0] = "inetOrgPerson";
   	    $info["objectclass"][1] = "account";
  	    $info["objectclass"][2] = "shadowAccount";
	    $info["userPassword"] = '{SHA}' . base64_encode(pack('H*',sha1($sandi)));;
	    $info["uid"] = $user_name;

	    // add data to directory
	   

	    if ($ldap_con) {
		    // bind with appropriate dn to give update access
		    $data = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
		    $data = ldap_add($ldap_con, "cn=$user_name, cn=user-group,ou=user,dc=ldap,dc=com", $info);
		    echo "<script>alert('BERHASIL ....');</script>";
		    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}else{
			echo "<script>window.history.back()</script>";
		}
	}
?>
