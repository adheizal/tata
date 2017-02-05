<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <?php
    include ("koneksi.php");
    if ($ldap_con) {
    // bind with appropriate dn to give update access
    $r = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
    $name = "user";

    // prepare data
    $info["cn"] = $name;
    $info["sn"] = $name;
    $info["objectclass"][0] = "inetOrgPerson";
    $info["objectclass"][1] = "account";
    $info["objectclass"][2] = "shadowAccount";
    $info["userPassword"] = '{SHA}' . base64_encode(pack('H*',sha1("root")));;
    $info["uid"] = $name;

    // add data to directory
    $r = ldap_add($ldap_con, "cn=$name, cn=user-group,ou=user,dc=ldap,dc=com", $info);

    ldap_close($ldap_con);
} else {
    echo "Unable to connect to LDAP server";
}

?>
</body>
</html>
