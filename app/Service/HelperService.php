<?php

namespace App\Service;

class HelperService
{
    public function __construct()
    {
    }

    public function formatDollarAmount(float $amount): string
    {
        $isNegative = $amount < 0;

        return ($isNegative ? '-' : '') . "$" . number_format(abs($amount), 2);
    }

    public function formatDate(string $date): string
    {
        return date("M j, Y", strtotime($date));
    }

    public function getAmountColor(int $amount): string
    {
        if ($amount < 0) {
            return "text-danger";
        } else if ($amount > 0) {
            return "text-success";
        } else {
            return "text-light";
        }
    }

}