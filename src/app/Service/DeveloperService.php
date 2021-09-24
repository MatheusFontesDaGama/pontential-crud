<?php

namespace App\Service;

use App\Models\Developer;
use App\Repository\DeveloperRepository;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DeveloperService 
{
    private $developerRepository;
    
    function __construct(DeveloperRepository $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    public function buscarDesenvolvedores(): array
    {
        $desenvolvedores = $this->developerRepository->buscarDesenvolvedores();

        if(empty($desenvolvedores)) {
            throw new Exception("Nenhum desenvolvedor encontrado", 404);
        }

        return $desenvolvedores;
    }

    public function buscarDesenvolvedorPorId(int $id): ?Developer
    {
        $desenvolvedor = $this->developerRepository->buscarDesenvolvedorPorId($id);

        if(empty($desenvolvedor)) {
            throw new Exception("Nenhum desenvolvedor encontrado", 404);
        }

        return $desenvolvedor;
    }

    public function inserirDesenvolvedor(array $dadosDesenvolvedor): void
    {
        $this->developerRepository->inserirDesenvolvedor($dadosDesenvolvedor);
    }

    public function atualizarUmDesenvolvedor(array $dadosDesenvolvedor, int $id): void
    {
        $this->developerRepository->atualizarUmDesenvolvedor($id, $dadosDesenvolvedor);
    }

    public function deletarDesenvolvedor(int $id): void
    {
        $this->developerRepository->deletarUmDesenvolvedor($id);
    }
}