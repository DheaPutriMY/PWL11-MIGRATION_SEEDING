<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    use HasFactory;

    protected $table = 'returns';

    protected $fillable = [
        'loan_detail_id',
        'charge',
        'amount',
    ];

    protected $casts = [
        'charge' => 'boolean',
    ];

    // Relationship
    public function loanDetail()
    {
        return $this->belongsTo(LoanDetail::class, 'loan_detail_id', 'id');
    }
}