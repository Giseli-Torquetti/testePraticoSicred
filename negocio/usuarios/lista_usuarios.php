<?php
require_once('../../persistencia/DAO/UsuarioDAO.php');

// Camada de Negócio
$usuarioDAO = new UsuarioDAO();
$listaUsuarios = $usuarioDAO->getUsuarios();
