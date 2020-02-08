<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerBank extends Model
{
    protected $primaryKey = 'id_answer';
    protected $fillable = ['id_question','is_true','answer'];
}
