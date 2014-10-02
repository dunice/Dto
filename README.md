DTO Component
==========
DTO (Data Transfer Objects) is a pattern used to encapsulate data and transfer them between application layers.

This component allows to create and access DTOs based on arrays and objects.

Example 
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

Example
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
