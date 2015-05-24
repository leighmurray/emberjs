<?php
  $path = '.';

  $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
  
  $bookFiles = [];
  
  foreach($objects as $name => $object){
    if ($object->isDir()) {
      continue;
    }
    if ($object->getExtension() !== 'md') {
      continue;
    }
    $bookFiles[] = substr($name, 2);
  }
  $str = implode("\n", $bookFiles);
  
  file_put_contents("Book.txt", $str);
?>