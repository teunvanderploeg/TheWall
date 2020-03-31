<?php
session_start();

if ( ! isset( $_SESSION['user_id'] ) ) {
	header( 'Location: login.php' );
}else if(!$_SESSION['user_id'] === 1){
	header( 'Location: index.php' );
}
?>