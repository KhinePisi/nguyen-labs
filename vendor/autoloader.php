<?php

namespace Vendor;

class Autoloader {

  public function __construct(){

    $variables = json_decode(file_get_contents( __DIR__ . '/../.env'));
    foreach ($variables as $key => $value) {
        putenv("$key=$value");
    }

  }

  public function env($key, $default = null)
      {
          $value = getenv($key);
          if ($value === false) {
              return $default;
          }
          return $value;
      }
}

?>