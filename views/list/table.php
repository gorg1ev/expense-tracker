<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<table class="my-5 container table table-striped table-hover w-50">
    <thead>
    <tr>
        <th scope="col">Date</th>
        <th scope="col">Check #</th>
        <th scope="col">Description</th>
        <th scope="col">Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($transactions)): ?>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $helpers->formatDate($transaction['date']) ?></td>
                <td><?= $transaction['checkNumber'] ?></td>
                <td><?= $transaction['description'] ?></td>
                <td>
                    <span class="<?= $helpers->getAmountColor($transaction['amount']) ?>">
                        <?= $helpers->formatDollarAmount($transaction['amount']) ?>
                    </span>
                </td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
    </tbody>
    <tfoot class="table-group-divider">
    <tr>
        <td colspan="2"></td>
        <th>Total Income:</th>
        <td><?= $helpers->formatDollarAmount($totals['totalIncome']) ?? 0 ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <th>Total Expense:</th>
        <td><?= $helpers->formatDollarAmount($totals['totalExpense']) ?? 0 ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <th>Net Total:</th>
        <td><?= $helpers->formatDollarAmount($totals['netTotal']) ?? 0 ?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>