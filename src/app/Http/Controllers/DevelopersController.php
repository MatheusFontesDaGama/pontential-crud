<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroDesenvolvedorRequest;
use App\Http\Requests\EdicaoDesenvolvedorRequest;
use App\Service\DeveloperService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $response = $this->developerService->buscarDesenvolvedores($request->all());

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

    public function adicionarDesenvolvedor(CadastroDesenvolvedorRequest $request)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $this->developerService->inserirDesenvolvedor($request->all());
            DB::commit();

            return response()->json(["msg" => "Desenvolvedor Cadastrado com sucesso!"]);
        } catch(Exception $erro) {
            DB::rollBack();

            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }

    public function atualizarUmDesenvolvedor(EdicaoDesenvolvedorRequest $request, int $id)
    {
        DB::beginTransaction();
        try {
            $this->developerService->atualizarUmDesenvolvedor($request->all(), $id);
            DB::commit();

            return response()->json(["msg" => "Desenvolvedor atualizado com sucesso!"]);
        } catch(Exception $erro) {
            DB::rollBack();

            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }

    public function apagarDesenvolvedor(int $id)
    {
        DB::beginTransaction();
        try {
            $this->developerService->deletarDesenvolvedor($id);
            DB::commit();

            return response()->json(["msg" => "Desenvolvedor apagado com sucesso!"]);
        } catch(Exception $erro) {
            DB::rollBack();
            
            return response()->json(['msg' => $erro->getMessage()], $erro->getCode());
        }
    }
}