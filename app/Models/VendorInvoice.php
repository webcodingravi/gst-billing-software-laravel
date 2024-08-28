<?php

namespace App\Models;

use App\Models\Party;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorInvoice extends Model
{
    use HasFactory;


    public function Party() {
        return $this->belongsTo(Party::class);
    }
}
