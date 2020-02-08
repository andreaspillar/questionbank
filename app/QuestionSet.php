<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
    protected $primaryKey = 'id_set';
    protected $fillable = ['sets_name', 'url', 'score'];
}
