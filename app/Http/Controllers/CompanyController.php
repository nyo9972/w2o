<?php

namespace App\Http\Controllers;

use App\Models\Colaborators;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Companies;

class CompanyController extends BaseController
{
    public function index()
    {
        $companies = Companies::all();
        $colaborators = Colaborators::all();
        return view('forms.company_form', [
            'companies' => $companies,
            'colaborators' => $colaborators,
        ]);
    }

    public function register(Request $request)
    {

        $remove = Companies::where('cnpj', '=', $request->input('cnpj'))->first();
        if($remove) {
            $remove->delete();
        }

        $data = [
            'corporate_name' => $request->input('corporate-name') ?: null,
            'cnpj' => $request->input('cnpj') ?: null,
            'phone' => $request->input('phone') ?: null,
            'email' => $request->input('email') ?: null,
            'cep' => $request->input('cep') ?: null,
            'rua' => $request->input('rua') ?: null,
            'number' => $request->input('number') ?: null,
            'district' => $request->input('district') ?: null,
            'city' => $request->input('city') ?: null,
            'estate' => $request->input('estate') ?: null,
        ];

        $result = Companies::create($data);
        $colaborators = Colaborators::all();
        $companies = Companies::all();
        return view('forms.company_form', [
            'companies' => $companies,
            'colaborators' => $colaborators,
        ]);
    }

    public function edit(Request $request)
    {
        $colaborators = Colaborators::all();
        $company = Companies::where('id', '=', $request->id)->first();
        return view('forms.company_form_edit', [
            'company' => $company,
            'colaborators' => $colaborators,
        ]);
    }

    public function destroy(Request $request)
    {
        $company = Companies::where('id', '=', $request->id)->first()->delete();
    }

    public function link(Request $request)
    {
        $colaborator = Colaborators::find($request->colaboratorId)->update([
            'company' => $request->companyId,
        ]);
    }
}
