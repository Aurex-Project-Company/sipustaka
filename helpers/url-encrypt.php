<?php
function encryptId($id) {
    $key = 'sipustaka-secret-key';
    $iv  = substr(hash('sha256', $key), 0, 16);

    return urlencode(
        base64_encode(
            openssl_encrypt($id, 'AES-256-CBC', $key, 0, $iv)
        )
    );
}

function decryptId($encrypted) {
    $key = 'sipustaka-secret-key';
    $iv  = substr(hash('sha256', $key), 0, 16);

    return openssl_decrypt(
        base64_decode(urldecode($encrypted)),
        'AES-256-CBC',
        $key,
        0,
        $iv
    );
}
?>