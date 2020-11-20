<?php
namespace Agileti\IOTestimonials;

use Dataview\IntranetOne\IOModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonials extends IOModel
{
    use SoftDeletes;
    //public $incrementing = false; //necessário para a pk não virar int
    protected $primaryKey = 'id';

    protected $fillable = ['tipo','nome','observacao'];

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
    }
}
