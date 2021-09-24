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

    public function buscarDesenvolvedores(): array
    {
        return $this->developer->all()->toArray();
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