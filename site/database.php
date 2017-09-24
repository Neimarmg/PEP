<?php
class Database
{
    private static $dbName = 'pep' ;
    private static $dbHost = 'localhost'; //'mysql.pep.kinghost.net' ;
    private static $dbUsername = 'root'; //'pep';
    private static $dbUserPassword = ''; //'84d235g4r8h';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
