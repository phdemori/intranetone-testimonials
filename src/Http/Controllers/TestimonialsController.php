<?php
namespace Agileti\IOTestimonials;

use DataTables;
use Dataview\IntranetOne\IOController;
use Agileti\IOTestimonials\Testimonials;
use Agileti\IOTestimonials\TestimonialsRequest;
use Illuminate\Http\Response;

class TestimonialsController extends IOController
{

    public function __construct()
    {
        $this->service = 'testimonials';
    }

    public function index()
    {
        return view('Testimonials::index');
    }

    function list() {
        $query = Testimonials::select('*')->orderBy('created_at', 'desc')->get();
        
        return Datatables::of(collect($query))->make(true);
    }

    public function create(TestimonialsRequest $request)
    {
        $check = $this->__create($request);
        
        if (!$check['status']) {
            return response()->json(['errors' => $check['errors']], $check['code']);
        }
        
        $obj = new Testimonials($request->all());
        $obj->save();

        return response()->json(['success' => true, 'data' => null]);
    }

    public function view($id)
    {
        $check = $this->__view();
        if (!$check['status']) {
            return response()->json(['errors' => $check['errors']], $check['code']);
        }

        $query = Testimonials::where('id', $id)->get();

        return response()->json(['success' => true, 'data' => $query]);
    }

    public function update($id, TestimonialsRequest $request)
    {
        $check = $this->__update($request);
        if (!$check['status']) {
            return response()->json(['errors' => $check['errors']], $check['code']);
        }

        $_new = (object) $request->all();
        $_old = Testimonials::find($id);
        $_old->tipo = $_new->tipo;
        $_old->pergunta = $_new->pergunta;
        $_old->resposta = $_new->resposta;
        $_old->observacao = $_new->observacao;

        $_old->save();
        return response()->json(['success' => $_old->save()]);
    }

    public function delete($id)
    {
        $check = $this->__delete();
        if (!$check['status']) {
            return response()->json(['errors' => $check['errors']], $check['code']);
        }

        $obj = Testimonials::find($id);
        $obj = $obj->delete();
        return json_encode(['sts' => $obj]);
    }

    public function checkId($id)
    {
        return Testimonials::select('pergunta')->where('id', '=', $id)->get();
    }

    public function get_enum_values( $table, $field )
    {
        $type = Testimonials::query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}
