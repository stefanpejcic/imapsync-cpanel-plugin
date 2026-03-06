<?php
require 'bootstrap.php';

$cpanel = new CPANEL();
print $cpanel->header( "Email Transfer" );
$accountName = Account::name($cpanel);
$hostname = hostname($cpanel);
if ($emailsActive = Account::MailsActive($cpanel)) {
    require 'views/index.view.live.php';
} else {
    require 'views/noemail.view.php';
}

echo $cpanel->footer();
$cpanel->end();


