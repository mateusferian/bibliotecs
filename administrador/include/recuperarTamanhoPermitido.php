<?php
      $uploadMaxSize = ini_get('upload_max_filesize');
$uploadMaxSizeBytes = return_bytes($uploadMaxSize);


// Função para converter tamanhos de arquivo
function return_bytes($size_str) {
    switch (substr($size_str, -1)) {
        case 'M':
        case 'm':
            return (int) $size_str * 1048576;
        case 'K':
        case 'k':
            return (int) $size_str * 1024;
        case 'G':
        case 'g':
            return (int) $size_str * 1073741824;
        default:
            return (int) $size_str;
    }
}
?>