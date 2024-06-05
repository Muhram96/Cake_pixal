<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCreditHistory extends Model
{
    use HasFactory;
    protected $fillable =['plan_id','user_id','credit_buy','expiry_date'];
    protected $table = 'user_credit_history';
}
