<?php

declare(strict_types=1);
// echo '<br />';

//your code
function getTransactionFiles(string $dirpath) : array
{
    $files = [ ];

    foreach(scandir($dirpath) as $file){
        // var_dump(is_dir($file));
        if  (is_dir($file)){
            continue;
        }
        
        // var_dump($file);

        $files[] = $dirpath . $file;

    // var_dump($files);

    }

    return $files;
} 


function getTransaction(string $fileName, ?callable $transactionHandler = null): array
{
    // var_dump($fileName);

    if( ! file_exists($fileName)){
        trigger_error('File " ' .  $fileName . '" does not exist. ', E_USER_ERROR);

    }

    $file  = fopen($fileName, 'r');

    fgetcsv($file);  //reads the first line

    $transactions = [];
    while(($transaction = fgetcsv($file)) !== false)
    {
            if($transactionHandler !== null){
                $transaction = $transactionHandler($transaction);
            }

            $transactions[] = $transaction;
    }
    // print_r($transactions);

    return  $transactions;

    
}

function extractTransaction(array $transactionRow): array
{

    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'                   => $date,
        'checkNumber'   => $checkNumber,
        'description'        => $description,
        'amount'             => $amount,
    ];
}


function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 
                    'totalIncome' => 0, 
                    'totalExpense' => 0 ];

    foreach($transactions as $transaction){
        $totals['netTotal'] += $transaction['amount'];

        if($transaction['amount'] >= 0){
            $totals['totalIncome'] += $transaction['amount'];
        }else{
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}