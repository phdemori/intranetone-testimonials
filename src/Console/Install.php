<?php
namespace Agileti\IOTestimonials\Console;
use Dataview\IntranetOne\Console\IOServiceInstallCmd;
use Agileti\IOTestimonials\IOTestimonialsServiceProvider;
use Agileti\IOTestimonials\TestimonialsSeeder;

class Install extends IOServiceInstallCmd
{
  public function __construct(){
    parent::__construct([
      "service"=>"testimonials",
      "provider"=> IOTestimonialsServiceProvider::class,
      "seeder"=>TestimonialsSeeder::class,
    ]);
  }

  public function handle(){
    parent::handle();
  }
}
