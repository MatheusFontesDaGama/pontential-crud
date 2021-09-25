<?php

namespace App\Repository;

use App\Models\Developer;

class DeveloperRepository 
{
    protected $developer;

    function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    public function buscarTodosOsDesenvolvedores(): array
    {
        return $this->developer->all()->toArray();
    }

    public function buscarDesenvolvedoresComFiltros(array $filtros)
    {
        $queryBuilder = $this->developer;

        if ($filtros['nome']) {
            $queryBuilder->where('nome', 'like', '%' . $filtros['nome'] . '%');
        }

        if ($filtros['sexo']) {
            $queryBuilder->where('sexo', '=', $filtros['sexo']);
        }

        if ($filtros['idade']) {
            $queryBuilder->where('idade', '=', $filtros['idade']);
        }

        if ($filtros['hobby']) {
            $queryBuilder->where('hobby', 'like', '%' . $filtros['hobby'] . '%');
        }

        if ($filtros['datanascimento']) {
            $queryBuilder->where('hobby', '=', $filtros['datanascimento']);
        }

        return $queryBuilder->paginate(15);
    }

    public function buscarDesenvolvedorPorId(int $id): ?Developer
    {
        return $this->developer->where('id', '=', $id)->first();
    }

    public function inserirDesenvolvedor(array $dados)
    {
        return $this->developer->insert($dados);
    }

    public function atualizarUmDesenvolvedor(int $id, array $dados)
    {
        return $this->developer->where('id', '=', $id)->update($dados);
    }

    public function deletarUmDesenvolvedor(int $id)
    {
        return $this->developer->where('id', '=', $id)->delete();
    }

}