<?php
session_start();
include_once("connect.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$delet_row= "DELETE FROM events WHERE id='$id'";
	$result= mysqli_query($conn, $delet_row);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento Excluido com sucesso!</div>';
		header("Location: caledar.php");
	}else{
		
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Evento não foi apagado!</div>';
		header("Location: calendar.php");
	}
}else{	
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: ID do evento não encontrado!</div>';
	header("Location: calendar.php");
}
?>