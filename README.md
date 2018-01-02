Parentheses
===========
Библиотека для провекри корректности открытия-закрытия скобок

Установка
---------
В файл  `composer.json` добавить строки:

```json
{
    "require": {
        "petrwl/parentheses": "*"
    }
}
```


Пример:
---------------------
```php
$string = '(((( )))  )';
$Parentheses = new \Parentheses\Parentheses($string);
if ($Parentheses->isBalanced()) {
    print 'String have balanced parentheses';
} else {
    print 'String have not balances parentheses';
}
```
