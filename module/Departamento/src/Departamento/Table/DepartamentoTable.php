<?php

namespace Departamento\Table;

use Estrutura\Table\AbstractEstruturaTable;

class DepartamentoTable extends AbstractEstruturaTable{

    public $table = 'departamento';
    public $campos = [

        'id_departamento'  => 'id',
        'nm_departamento' => 'nm_departamento',

    ];

}