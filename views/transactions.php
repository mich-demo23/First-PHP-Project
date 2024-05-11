<html>
    <head>

    </head>
</html>
<body style='align-items: center; padding:10px'>
    <table style='border: 5px solid; padding: 15px; align-items: center; margin: 46px;'>
        <thead >
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody style='border: solid;'>
                    <?php if (! empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                                <td style='border: 1px solid; padding: 7px;'><?= formatDate($transaction['date']) ?> </td>
                                <td style='border: 1px solid'><?= $transaction['checkNumber'] ?> </td>
                                <td style='border: 1px solid'><?= $transaction['description'] ?> </td>
                                <td style='border: 1px solid; padding: 10px;'>
                                    <?php if($transaction['amount'] > 0): ?>
                                            <span style='color:green'>
                                                <?= formatDollarAmount($transaction['amount']) ?>
                                            </span>
                                    <?php elseif ($transaction['amount'] < 0): ?>
                                      <span style='color:red'>
                                                <?= formatDollarAmount($transaction['amount']) ?>
                                            </span>
                                     <?php else: ?>
                                                <?= formatDollarAmount($transaction['amount']) ?>
                                     <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income </th>
                <td>
                    <?= formatDollarAmount($totals['totalIncome'] ?? 0 ) ?>
                    
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense </th>
                <td>
                  <?= formatDollarAmount($totals['totalExpense'] ?? 0 ) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total</th>
                <td>
                      <?= formatDollarAmount($totals['netTotal'] ?? 0) ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>