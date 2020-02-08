<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $primaryKey = 'id_question';
    protected $fillable = ['question','id_set'];
}
