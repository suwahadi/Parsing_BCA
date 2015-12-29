<html>
<head>
<title>Mutasi BCA</title>

<style>
body, th, td, pre {
	font-size:12px;
	color: #000;
	font-family:'Open Sans',Verdana, Geneva, sans-serif;
}
</style>

<head>
<body>

<?php
error_reporting( E_ALL );
require( 'IbParser.php' );
$parser = new IbParser();
?>


<?php

$bank    = 'BCA';
$user    = 'username';
$pass    = 'pin123';

$balance = $parser->getBalance( $bank, $user, $pass );

?>

<table>
	<tr>
		<th align="left">Account:</th>
	</tr>

	<tr>
		<td><?php echo $bank . ' ' . $user; ?></td>
	</tr>

</table>

<hr />

<?php $transactions = $parser->getTransactions( $bank, $user, $pass ); ?>

<table>
	<tr>
		<th>&nbsp;</th>
		<th align="left">Tgl</th>
		<th align="left">Keterangan</th>
		<th>DB/CR</th>
		<th>Nominal</th>
	</tr>
	
	<?php foreach( $transactions as $index => $baris ) : ?>
	
	<tr>
		<td>&nbsp;</td>
		<td><?php echo $baris[0]; ?></td>
		<td><?php echo $baris[1]; ?></td>
		<td><?php echo $baris[2]; ?></td>
		<td><?php echo $baris[3]; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


<table>
	<tr>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>SALDO:</th>
	<th>&nbsp;</th>
		<th align="left"><?php echo ( !$balance )? 'Gagal mengambil saldo': number_format( $balance, 2 ); ?></th>
	</tr>
</table>

<body>