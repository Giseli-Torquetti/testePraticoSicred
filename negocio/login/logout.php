<?php
require_once('../../base.php');
require_once( DIR_BASE . '\negocio\login\Sessao.php');
$sessao = new Sessao();
$sessao->destruirSessao();
header("Location: " . URL_BASE . "../aplicacao/index.html");
?>