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

<?php $transactions = $parser->getTransactions( $bank, $user, $pass ); ?>
<pre>Transaksi     : <?php echo ( !$transactions )? 'Gagal mengambil transaksi': print_r( $transactions, true ); ?></pre>