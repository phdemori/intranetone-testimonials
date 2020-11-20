<?php
namespace Agileti\IOTestimonials;

use Dataview\IntranetOne\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Sentinel;

class TestimonialsSeeder extends Seeder
{
    public function run()
    {
        //cria o serviço se ele não existe
        if (!Service::where('service', 'Condomínio')->exists()) {
            Service::insert([
                'service' => "Testimonials",
                'alias' => 'festimonials',
                'ico' => 'ico-building',
                'description' => 'Testimonials do Site',
                'order' => Service::max('order') + 1,
            ]);
        }
        //seta privilegios padrão para o role odin
        $odinRole = Sentinel::findRoleBySlug('odin');
        $odinRole->addPermission('testimonials.view');
        $odinRole->addPermission('testimonials.create');
        $odinRole->addPermission('testimonials.update');
        $odinRole->addPermission('testimonials.delete');
        $odinRole->save();

        //seta privilegios padrão para o role admin
        $adminRole = Sentinel::findRoleBySlug('admin');
        $adminRole->addPermission('testimonials.view');
        $adminRole->addPermission('testimonials.create');
        $adminRole->addPermission('testimonials.update');
        $adminRole->addPermission('testimonials.delete');
        $adminRole->save();
    }
}
