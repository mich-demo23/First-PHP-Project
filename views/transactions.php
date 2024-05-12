<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transanction Statement App</title>
    </head>
</html>
<body>
    <table style='border: 5px solid; padding: 9px; align-items: center; margin: 0 auto;'>
        <thead>
            <tr>
                <th style="padding: 15px;">Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
                    <?php if (! empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                                <td style='border: 1px solid; padding: 12px;'><?= formatDate($transaction['date']) ?> </td>
                                <td style='border: 1px solid; padding: 12px;'><?= $transaction['checkNumber'] ?> </td>
                                <td style='border: 1px solid; padding: 12px;'><?= $transaction['description'] ?> </td>
                                <td style='border: 1px solid; padding: 12px;'>
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
            <tr >
                <th colspan="3" style='border: solid;'>Total Income </th>
                <td style='border: solid;'>
                    <?= formatDollarAmount($totals['totalIncome'] ?? 0 ) ?>
                    
                </td>
            </tr>
            <tr>
                <th colspan="3" style='border: solid;'>Total Expense </th>
                <td style='border: solid;'>
                  <?= formatDollarAmount($totals['totalExpense'] ?? 0 ) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3" style='border: solid;'>Net Total</th>
                <td style='border: solid;'>
                      <?= formatDollarAmount($totals['netTotal'] ?? 0) ?>
                </td>
            </tr>
        </tfoot>
    </table>


</body>