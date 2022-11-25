<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_busca extends CI_Model
{

    public function acesso($login, $senha)
    {
        if ($login == 'admin' && $senha == 'admin') {
            return 1;
        } else {
            return 2;
        }
    }

    public function busca()
    {
        $retorno = [
            [
                "registro" => 5511,
                "nome" => "Daniel",
                "idade" => "25",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ],
            [
                "registro" => 5501,
                "nome" => "Eliel",
                "idade" => "21",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'CUSTOS',
            ],
            [
                "registro" => 5011,
                "nome" => "Mauricio",
                "idade" => "28",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ],
            [
                "registro" => 1511,
                "nome" => "Marcio",
                "idade" => "39",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ],
            [
                "registro" => 2211,
                "nome" => "Andre",
                "idade" => "23",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'CUSTOS',
            ],
            [
                "registro" => 5271,
                "nome" => "Bras",
                "idade" => "60",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ],
            [
                "registro" => 5588,
                "nome" => "Bruno",
                "idade" => "20",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'RH',
            ],
            [
                "registro" => 6781,
                "nome" => "Vinicius",
                "idade" => "19",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'DIRETORIA',
            ],
            [
                "registro" => 6441,
                "nome" => "Fernando",
                "idade" => "19",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ],
            [
                "registro" => 3431,
                "nome" => "Breno",
                "idade" => "35",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'RH',
            ],
            [
                "registro" => 3001,
                "nome" => "Erika",
                "idade" => "45",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'CUSTOS',
            ],
            [
                "registro" => 9001,
                "nome" => "Moacir",
                "idade" => "47",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
                "setor" => 'TI',
            ]
        ];
        return $retorno;
    }
}
