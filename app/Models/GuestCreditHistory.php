<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestCreditHistory extends Model
{
    use HasFactory;
    protected $fillable =['tool_id','ip_address','credit_consumed'];
    protected $table = 'gust_credit_history';
}
