<?php

namespace Agileti\IOTestimonials;

use Dataview\IntranetOne\IORequest;
use Illuminate\Validation\Rule;

class TestimonialsRequest extends IORequest
{
    public function sanitize()
    {
        $input = parent::sanitize();
        $this->replace($input);
        return $input;
    }

    public function rules()
    {
        $input = $this->sanitize();
        return [           
            'tipo' => 'required',
            'nome' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tipo' => 'O Tipo é obrigatório',
            'nome' => 'O Nome é obrigatório',
        ];
    }
}
