<?php
xdebug_disable();
ini_set('error_reporting', E_ERROR);

require 'FileMaker.php';

$fm = new FileMaker('php7-test','localhost:9999','test','test');

$find = $fm->newFindCommand('test');
$find->addFindCriterion('id', '== 1');
$result = $find->execute();

if($fm->isError($result)) {
  echo $result->getCode() . ' ' . $result->getMessage();
  exit(1);
}

$record =  $result->getFirstRecord();
echo $record->getField('text');
