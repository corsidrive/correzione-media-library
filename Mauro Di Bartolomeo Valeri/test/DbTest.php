<?php
include '../autoload.php';

echo "connessione deve essere sempre uguale\n";
var_dump(Db::getInstance() === Db::getInstance());

echo "deve essere istanza del PDO \n";
var_dump(is_a(Db::getInstance(),'PDO'));