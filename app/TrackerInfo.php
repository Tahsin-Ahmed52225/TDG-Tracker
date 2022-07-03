<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackerInfo extends Model
{
    protected $table = "trackerinfo";
    protected $fillable = ['IP','ActiveDomain','TemplateName','browserName','browserVersion','city','country','continent'];
}
