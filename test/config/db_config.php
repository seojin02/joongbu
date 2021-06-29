<?
  use Medoo\Medoo;

  // Initialize
  $database = new Medoo([
      'database_type' => 'mysql',
      'database_name' => DB_DATABASE,
      'server' => DB_HOST,
      'username' => DB_USER,
      'password' => DB_PASSWD
  ]);
