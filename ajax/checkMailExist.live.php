<?php
require_once "/usr/local/cpanel/php/cpanel.php"

$emailDst = $_POST["migration->emailDst"] ?? null;
if (!$emailDst) {
    die("Error: Missing email destination.");
}

$cpanel = new CPANEL();
if ( ! in_array($emailDst, Account::MailsActive())) {
    die("Error: The destination email does not exist on this account.");
}
