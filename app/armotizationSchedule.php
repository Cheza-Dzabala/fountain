<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class armotizationSchedule extends Model
{
    //
    protected $table = 'amortizationSchedule';

    protected $fillable = [
       'loanId', 'settlementDate', 'principle', 'interest', 'isSettled', 'balance', 'total', 'settledOn', 'chequeNumber',
        'receiptNumber', 'paymentLoggedBy', 'paymentType', 'isDefaulted'
    ];

    public function scopeGetAfter ($query, $endDate)
    {
            return $query->where('settlementDate', '<=', $endDate);
    }

    public function scopeGetBefore($query, $today)
    {
        return $query->where('settlementDate', '>=', $today);
    }

    public function scopeIsSettled($query)
    {
        return $query->whereIssettled(1);
    }

    public function scopeGetJan($query)
    {
        return $query->whereMonth('settlementDate', '=', 01);
    }

    public function scopeGetFeb($query)
    {
        return $query->whereMonth('settlementDate', '=', 02);
    }
    public function scopeGetMar($query)
    {
        return $query->whereMonth('settlementDate', '=', 03);
    }

    public function scopeGetApr($query)
    {
        return $query->whereMonth('settlementDate', '=', 04);
    }

    public function scopeGetMay($query)
    {
        return $query->whereMonth('settlementDate', '=', 05);
    }

    public function scopeGetJun($query)
    {
        return $query->whereMonth('settlementDate', '=', 06);
    }

    public function scopeGetJul($query)
    {
        return $query->whereMonth('settlementDate', '=', 07);
    }

    public function scopeGetAug($query)
    {
        return $query->whereMonth('settlementDate', '=', '08');
    }

    public function scopeGetSep($query)
    {
        return $query->whereMonth('settlementDate', '=', '09');
    }
    public function scopeGetOct($query)
    {
        return $query->whereMonth('settlementDate', '=', 10);
    }


    public function scopeGetNov($query)
    {
        return $query->whereMonth('settlementDate', '=', 11);
    }


    public function scopeGetDec($query)
    {
        return $query->whereMonth('settlementDate', '=', 12);
    }
}
