<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Colaborators;

class ColaboratorController extends BaseController
{
    public function index()
    {
        $colaborators = Colaborators::all();
        return view('forms.colaborator_form', [
            'colaborators' => $colaborators,
        ]);
    }

    public function register(Request $request){

        $remove = Colaborators::where('email', '=', $request->input('email'))->first();
        if($remove) {
            $remove->delete();
        }

        if($request->input('birth')){
            $bird = $request->input('birth');
            $show_date = DateTime::createFromFormat('d/m/Y', $bird)->format('Y-m-d');
        } else {
            $show_date = null;
        }

        $data = [
            'name' => $request->input('name') ?: null,
            'email' => $request->input('email') ?: null,
            'birth' => $show_date  ?: null,
            'phone' => $request->input('phone') ?: null,
        ];

        $result = Colaborators::create($data);
        $colaborators = Colaborators::with('companies')->get();
        return view('forms.colaborator_form', [
            'colaborators' => $colaborators,
        ]);
    }

    public function edit(Request $request)
    {
        $colaborator = Colaborators::where('id', '=', $request->id)->first();
        return view('forms.colaborator_form_edit', [
            'colaborator' => $colaborator,
        ]);
    }

    public function destroy(Request $request)
    {
        $colaborators = Colaborators::where('id', '=', $request->id)->first()->delete();
    }

    public function information(Request $request)
    {
        $colaborator = Colaborators::where('company', '=', $request->id)->where('birth', '=', $request->birth)->first();
        return $colaborator;
    }
}
