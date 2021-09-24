<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service\DeveloperService;
use Exception;
use Illuminate\Http\Request;

class DevelopersController extends Controller 
{
    protected $developerService;

    function __construct(DeveloperService $developerService)
    {
        $this->developerService = $developerService;
    }

    public function obterDesenvolvedores(Request $request)
    {
        try {
            $response = $this->developerService->buscarDesenvolvedores();

            return response()->json($response);
        } catch(Exception $erro) {
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }

    }

    public function obterDesenvolvedorPorId(int $id) 
    {
        try {
            $response = $this->developerService->buscarDesenvolvedorPorId($id);

            return response()->json($response);
        } catch(Exception $erro) {
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }

    public function adicionarDesenvolvedor(Request $request)
    {
        try {
            $this->developerService->inserirDesenvolvedor($request->all());

            return response()->json(["msg" => "Desenvolvedor Cadastrado com sucesso!"]);
        } catch(Exception $erro) {
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }

    public function atualizarUmDesenvolvedor(Request $request, int $id)
    {
        try {
            $this->developerService->atualizarUmDesenvolvedor($request->all(), $id);

            return response()->json(["msg" => "Desenvolvedor atualizado com sucesso!"]);
        } catch(Exception $erro) {
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }

    public function apagarDesenvolvedor(int $id)
    {
        try {
            $this->developerService->deletarDesenvolvedor($id);

            return response()->json(["msg" => "Desenvolvedor apagado com sucesso!"]);
        } catch(Exception $erro) {
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }
}