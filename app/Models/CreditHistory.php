<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'tool_id',
        'token_consumed',];
    protected $table = 'credit_history';
}
