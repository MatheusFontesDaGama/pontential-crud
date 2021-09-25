<?php

namespace App\Service;

use App\Models\Developer;
use App\Repository\DeveloperRepository;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeveloperService 
{
    private $developerRepository;
    private $statusCodeNotFound = 404;
    function __construct(DeveloperRepository $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    public function buscarDesenvolvedores(array $filtros): array
    {
        $desenvolvedores = $this->developerRepository->buscarTodosOsDesenvolvedores();

        if(empty($desenvolvedores)) {
            throw new Exception("Nenhum desenvolvedor encontrado", $this->statusCodeNotFound);
        }
    
        return $desenvolvedores;
    }

    public function buscarDesenvolvedoresComFiltros(array $filtros)
    {
        $desenvolvedores = $this->developerRepository->buscarDesenvolvedoresComFiltros($filtros);

        if(empty($desenvolvedores)) {
            throw new Exception("Nenhum desenvolvedor encontrado", $this->statusCodeNotFound);
        }

        return $desenvolvedores;
    }

    public function buscarDesenvolvedorPorId(int $id): ?Developer
    {
        $desenvolvedor = $this->developerRepository->buscarDesenvolvedorPorId($id);

        if(empty($desenvolvedor)) {
            throw new Exception("Nenhum desenvolvedor encontrado", $this->statusCodeNotFound);
        }

        return $desenvolvedor;
    }

    public function inserirDesenvolvedor(array $dadosDesenvolvedor): void
    {
        $dataNascimento  = date_create($dadosDesenvolvedor['datanascimento']);
        date_format($dataNascimento, "Y-m-d");
        
        $dadosDesenvolvedor['datanascimento'] = $dataNascimento;
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