<?php

namespace App\Service;

class TransactionService
{
    public static function extractTransaction(array $transactionRow): array
    {
        [$date, $checkNumber, $description, $amount] = $transactionRow;

        $amount = (float)str_replace(['$', ','], '', $amount);

        return [
            'date' => $date,
            'checkNumber' => $checkNumber,
            'description' => $description,
            'amount' => $amount
        ];
    }

    public static function calculateTotals(array $transactions): array
    {
        $totals = [
            'netTotal' => 0,
            'totalIncome' => 0,
            'totalExpense' => 0
        ];

        foreach ($transactions as $transaction) {
            $totals['netTotal'] += $transaction['amount'];

            if ($transaction['amount'] >= 0) {
                $totals['totalIncome'] += $transaction['amount'];
            } else {
                $totals['totalExpense'] += $transaction['amount'];
            }
        }

        return $totals;
    }
}