<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    //
    protected $table = 'loans';

    protected $fillable = [
        'clientId',
        'loanType',
        'loanAmount',
        'loanRepaymentPeriod',
        'expectedDateOfCompletion',
        'applicationStatusId',
        'isActive',
        'recommendedBy',
        'createdBy',
        'recommendationNotes'
    ];

    public function scopeGetJan($query)
    {
        return $query->whereMonth('disbursementDate', '=', 01);
    }

    public function scopeGetFeb($query)
    {
        return $query->whereMonth('disbursementDate', '=', 02);
    }
    public function scopeGetMar($query)
    {
        return $query->whereMonth('disbursementDate', '=', 03);
    }

    public function scopeGetApr($query)
    {
        return $query->whereMonth('disbursementDate', '=', 04);
    }

    public function scopeGetMay($query)
    {
        return $query->whereMonth('disbursementDate', '=', 05);
    }

    public function scopeGetJun($query)
    {
        return $query->whereMonth('disbursementDate', '=', 06);
    }

    public function scopeGetJul($query)
    {
        return $query->whereMonth('disbursementDate', '=', 07);
    }

    public function scopeGetAug($query)
    {
        return $query->whereMonth('disbursementDate', '=', 08);
    }

    public function scopeGetSep($query)
    {
        return $query->whereMonth('disbursementDate', '=', 09);
    }
     public function scopeGetOct($query)
    {
        return $query->whereMonth('disbursementDate', '=', 10);
    }


       public function scopeGetNov($query)
    {
        return $query->whereMonth('disbursementDate', '=', 11);
    }


       public function scopeGetDec($query)
    {
        return $query->whereMonth('disbursementDate', '=', 12);
    }





}
