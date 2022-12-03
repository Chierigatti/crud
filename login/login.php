
<?php
	session_start();
?>

<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
$senha = mysqli_real_escape_string($db, $_POST['senha']);

$query = "select username from users where username = '{$usuario}' and password = sha2('{$senha}',256)";

$result = mysqli_query($db, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}