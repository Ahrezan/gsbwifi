<?php

    session_start();
    session_unset();  // Oturum değişkenlerini temizler
    session_destroy();  // Oturumu yok eder
    header("Location: Giriş.php");  // Giriş sayfasına yönlendirme
    exit;

?>