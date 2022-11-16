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
                "nome" => "Daniel",
                "idade" => "25",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Eliel",
                "idade" => "21",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Mauricio",
                "idade" => "28",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Marcio",
                "idade" => "39",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Andre",
                "idade" => "23",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Bras",
                "idade" => "60",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Bruno",
                "idade" => "20",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Vinicius",
                "idade" => "19",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ],
            [
                "nome" => "Fernando",
                "idade" => "19",
                "cpf" => "000-000-000-00",
                "Prof" => "Analista",
            ]
        ];
        return $retorno;
    }
}
