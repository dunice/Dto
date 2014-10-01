DTO Component
==========
DTO (Data Transfer Objects) is a pattern to encapsulate data and transfer between application layers.

This component allows to create and access recursively arrays

Example 1 
---------
```php
<?php
$params = array(
  'idPerson' => 1,
  'idAddress' => array(
    'idAddress' => 1,
    'txAddress' => '5th Avenue, 1250'
  )
);
$dto = new \Dto\Mapping\Base($params);

$dto->getIdPerson(); // 1
$dto->getIdAddress(); // DtoObject
$dto->getIdAddress()->getIdAddress(); // 1
$dto->getIdAddress()->getTxAddress(); // 5th Avenue, 1250
```

Example 2
---------
```php
<?php
$params = array(
  'idPerson' => 1
);
$dto = new \Dto\Mapping\Base($params);

$dto->getIdPerson(); // 1

// Now set an address info
$dto->setIdAddress(array(
    'idAddress' => 1,
    'txAddress' => '5th Avenue, 1250'
));

$dto->getIdAddress(); // DtoObject
$dto->getIdAddress()->getIdAddress(); // 1
$dto->getIdAddress()->getTxAddress(); // 5th Avenue, 1250
```
