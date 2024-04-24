<?php
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo "GD kütüphanesi yüklüdür.";
} else {
    echo "GD kütüphanesi yüklenmemiştir. Lütfen yükleyin.";
}
?>