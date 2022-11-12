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
}
