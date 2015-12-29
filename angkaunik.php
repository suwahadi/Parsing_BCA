<?php

error_reporting( E_ALL );

$bank    = 'BCA';
$user    = 'username';
$pass    = 'pin123';


$output = array( 'uidfound' => false  );

if ( isset( $_GET['uid'] ) && is_numeric( $_GET['uid']  ) )
{

    // pastikan format $_GET['uid'] akan sama dengan format nilai transaksi
    // yg didapat dari parser.
    $_GET['uid'] = number_format( $_GET['uid'], 2, '.', '' );

    require 'IbParser.php';

    $parser = new IbParser;
    
    // Ambil transaksi
    if ( $transactions = $parser->getTransactions( $bank, $user, $pass ) )
    {

        // echo '<pre>' . print_r( $transactions, true ) . '</pre>';

        // loop
        foreach( $transactions as $transaction )
        {

            // kalau $_GET['uid'] ditemukan dan adalah penambahan saldo
            // if ( $_GET['uid'] == $transaction[3] && $transaction[2] == 'CR' )

            // kalau $_GET['uid'] ditemukan
            if ( $_GET['uid'] == $transaction[3] )
            {
                $output['uidfound']    = true;
                $output['type']        = $transaction[2];
                $output['date']        = $transaction[0];
                $output['detail']      = $transaction[1];
                break;
            }

        }

    }

}

echo ( isset( $_GET['human'] ) )? '<pre>' . print_r( $output, true ) . '</pre>': json_encode( $output );

