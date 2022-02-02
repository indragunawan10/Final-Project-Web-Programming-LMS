<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function transactionDetail() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'transaction_id');
    }
}
