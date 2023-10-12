<?php

    try {
        $pdo = new PDO("mysql:host=127.0.0.1:3312;dbname=lxtec_crud", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro) {
        echo "ERRO =>" . $erro->getMessage();
    }

?>