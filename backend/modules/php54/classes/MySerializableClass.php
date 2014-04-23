<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.04.14
 * Time: 18:14
 */

namespace backend\modules\php54\classes;

class MySerializableClass implements \JsonSerializable
{

    public $a = 2;
    private $b = 4;

    public function jsonSerialize()
    {
        return [
            'a' => $this->a,
            'b' => $this->b,
            'c' => 3
        ];
    }

} 