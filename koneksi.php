<?php
$ldap_dn = "cn=admin,dc=ldap,dc=com";
$ldap_pass = "root";
$dn = "dc=ldap,dc=com";

$ldap_con = ldap_connect("10.0.2.15",389);
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
?>
