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
    $name = "didik";

    // prepare data
    $info["cn"] = $name;
    $info["sn"] = $name;
    $info["objectclass"] = "inetOrgPerson";
    $info["userPassword"] = '{SHA}' . base64_encode(pack('H*',sha1("jangkrik")));;
    $info["uid"] = $name;

    // add data to directory
    $r = ldap_add($ldap_con, "cn=$name, cn=user-group,ou=user,dc=tata,dc=com", $info);

    ldap_close($ldap_con);
} else {
    echo "Unable to connect to LDAP server";
}

?>
</body>
</html>
