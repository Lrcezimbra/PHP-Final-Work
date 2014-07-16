<?php
include '../modelo/cliente.class.php';

$cli = new Cliente();

$cli->nome = $_POST['txtNome'];
$cli->razaoSocial = $_POST['txtRazaoSocial'];
$cli->cnpj = $_POST['txtCnpj'];
$cli->endereco = $_POST['txtEndereco'];
$cli->telefone1 = $_POST['telTelefone1'];
$cli->telefone2 = $_POST['telTelefone2'];
$cli->email = $_POST['email'];
$cli->site = $_POST['urlSite'];
$cli->obs = $_POST['txtObs'];

echo $cli;
?>