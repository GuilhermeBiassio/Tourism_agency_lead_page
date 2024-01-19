<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use App\Models\Background;
use Illuminate\Http\Request;
use App\Http\Requests\FormDataRequest;

class MailFormController extends Controller
{
    public function index()
    {
        $data = Background::all();
        // dd($data);
        return view('site.mailForm.index')->with('title', 'Cadastro')->with('images', $data);
    }

    public function store(FormDataRequest $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => env('RECAPTCHA_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response')
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $responseArray = json_decode($response, true);
        $success = $responseArray['success'];
        if ($success) {
            $requestArr = $request->all();
            $requestArr['ip'] = $request->ip();
            $data = FormData::create($requestArr);
            return to_route('site.index')->with('success.message', 'Dados cadastrados com sucesso!');
        } else {
            return to_route('site.index')->with('error.message', 'Erro na resposta do RECAPTCHA!');
        }

    }
}
