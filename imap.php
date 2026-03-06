<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Method not allowed.");
}

$emailOrg    = filter_input(INPUT_POST, 'emailOrg', FILTER_VALIDATE_EMAIL);
$passwordOrg = $_POST['passwordOrg'] ?? '';
$imapOrg     = $_POST['imapOrg'] ?? '';

$emailDst    = filter_input(INPUT_POST, 'emailDst', FILTER_VALIDATE_EMAIL);
$passwordDst = $_POST['passwordDst'] ?? '';
$imapDst     = $_POST['imapDst'] ?? '';

if (!$emailOrg || !$emailDst || empty($passwordOrg) || empty($imapOrg) || empty($passwordDst) || !$imapDst) {
    die("ERROR: All fields are required.");
}

// Validations
$safeEmailOrg    = escapeshellarg($emailOrg);
$safePassOrg     = escapeshellarg($passwordOrg);
$safeImapOrg     = escapeshellarg($imapOrg);

$safeEmailDst    = escapeshellarg($emailDst);
$safePassDst     = escapeshellarg($passwordDst);
$safeImapDst     = escapeshellarg($imapDst);

$command = "imapsync --no-modulesversion " .
           "--host1 $safeImapOrg --user1 $safeEmailOrg --pass1 $safePassOrg --ssl1 " .
           "--host2 $safeImapDst --user2 $safeEmailDst --pass2 $safePassDst --ssl2";

$env = [
    'PATH' => '/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin',
    'LC_ALL' => 'en_US.UTF-8'
];

$descriptorspec = [
    0 => ['pipe', 'r'], // stdin
    1 => ['pipe', 'w'], // stdout
    2 => ['pipe', 'w'], // stderr
];

$process = proc_open($command, $descriptorspec, $pipes, null, $env);

if (is_resource($process)) {
    $output = stream_get_contents($pipes[1]);
    $error  = stream_get_contents($pipes[2]);

    fclose($pipes[0]);
    fclose($pipes[1]);
    fclose($pipes[2]);

    $return_code = proc_close($process);

    if ($return_code !== 0) {
        echo "Failed to initialize the transfer process, please check the provided data.";
    } else {
        echo "<pre>" . htmlspecialchars($output) . "</pre>";
    }
} else {
    die("Failed to initialize the transfer process, contact Administrator.");
}
