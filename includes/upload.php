<?php

function enviarArquivo($error, $size, $name, $tmp_name) {

    if($error)
        die("Falha ao enviar arquivo");

    if($size > 2097152)
        die("Arquivo muito grande!! Max: 2MB"); 

    $pasta = "../../../assets/images/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        return "assets/images/" . $novoNomeDoArquivo . "." . $extensao;
    } else
        return false;
}
?>