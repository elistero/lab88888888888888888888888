<?php namespace Krauskaite;

use core\LogAbstract;
use core\LogInterface;


Class MyLog extends LogAbstract implements LogInterface {



    public function _log(String $str){
        $this->log[]=$str;
    }

    /**
     * @param String $str строка для записи в массив лога
     */
    public static function log(string $str):void{
        self::Instance()->_log($str);
	}
    
    public function _write(){


        $d = date_create();
        $z = (string)$d->format('d-m-Y\TH.i.s.u');
        foreach($this->log as $value){
            echo $value."\n";

            file_put_contents(__DIR__ . "\..\log\\".$z.".log", trim($value."\r\n") . PHP_EOL, FILE_APPEND);
        }
        
    }
    
    public static function write():void{
        self::Instance()->_write();
    }

}

?>