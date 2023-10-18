<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Emidetail extends Model
{

 protected $table = 'bank_details';

 protected $fillable = ['banks_id', 'monthly', 'emi', 'effective_cost'];
 

}
