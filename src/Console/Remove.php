<?php
namespace Agileti\IOTestimonials\Console;

use Dataview\IntranetOne\Console\IOServiceRemoveCmd;
use Dataview\IntranetOne\IntranetOne;
use Agileti\IOTestimonials\IOTestimonialsServiceProvider;


class Remove extends IOServiceRemoveCmd
{
  public function __construct(){
    parent::__construct([
      "service"=>"testimonials",
      "tables" =>['testimonials'],
    ]);
  }

  public function handle(){
    parent::handle();
  }
}
