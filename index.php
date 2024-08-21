<?php
include 'functions.php';
// Your PHP code here.
$titulo = "Pagina Inicial";
// Home Page template below.
?>

<?= template_header($titulo) ?>

<div class="content">
	<h2> <?php echo ($titulo) ?></h2>
	<p>SEJA BEM-VINDO A ESTÁ PAGINA!</p>
</div>

<?= template_footer() ?>