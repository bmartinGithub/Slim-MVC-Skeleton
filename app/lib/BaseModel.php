<?php
/**
 * Created by IntelliJ IDEA.
 * User: brucemartin
 * Date: 2019-02-09
 * Time: 22:50
 */

namespace App\Lib;

use Illuminate\Database\Query\Builder;
use Psr\Container\ContainerInterface;

class BaseModel
{
    use Traits\BaseTraits;

    protected  $table;
    protected $tableName;

    public function __construct(ContainerInterface $c)
    {
        $calledNameSpace = explode("\\",get_called_class());
        $class = array_pop($calledNameSpace);
        $this->tableName = strtolower(str_replace('Model','',$class))."s";
        $this->table = $c->get('db')->table($this->tableName);
    }

    public function getTable(){
        return $this->table;
    }
}