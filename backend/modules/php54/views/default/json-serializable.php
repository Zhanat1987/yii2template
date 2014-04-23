<a href="http://php.net/manual/ru/class.jsonserializable.php" target="_blank">
    Документация
</a>
<p>
    Объекты, реализующие интерфейс JsonSerializable, могут адаптировать свое JSON-представление когда кодируются с помощью json_encode().
</p>
<?php
highlight_string("<?php
 JsonSerializable {
/* Методы */
// Задает данные, которые должны быть сериализованы в JSON
abstract public mixed jsonSerialize ( void )
}
?>");
?>
<p>
    Пример:<br />
    <?php
    highlight_string("<?php
/*
возвращает только значения свойств объекта ('c' не вернет)
*/
class MySerializableClass implements JsonSerializable
{
        public \$a=2;
        private \$b=4;
        public function JsonSerialize() {
                return array('a'=>\$this->a, 'b'=>\$this->b, 'c'=>3);
        }
}

\$MySerializeInstance = new MySerializableClass();
print json_encode(\$MySerializeInstance);
?>");
    ?>
</p>
<p>
    Результат:<br />
    <?php
    $test = new \backend\modules\php54\classes\MySerializableClass;
    \common\myhelpers\Debugger::debug($test);
    ?>
</p>