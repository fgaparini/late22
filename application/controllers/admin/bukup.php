<?php

class Bukup extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        //servidor MySql  
        $C_SERVER = 'localhost';
        //base de datos  
        $C_BASE_DATOS = 'avanbook';
        //usuario y contraseña de la base de datos mysql  
        $C_USUARIO = 'root';
        $C_CONTRASENA = '';
        //ruta archivo de salida   
        //(el nombre lo componemos con Y_m_d_H_i_s para que sea diferente en cada backup)  
        
        //Ubuntu
         //$C_RUTA_ARCHIVO = '/var/www/avanbook/bukup/backup_' . date("Y_m_d_H_i_s") . '.sql';
        //windows
         $C_RUTA_ARCHIVO = 'C:\wamp\www\avanbook\bukup\backup_' . date("Y_m_d_H_i_s") . '.sql';
        
        //si vamos a comprimirlo  
        $C_COMPRIMIR_MYSQL = 'true';


        //comando  
        $command = "mysqldump --opt -h " . $C_SERVER . " " . $C_BASE_DATOS . " -u " . $C_USUARIO . " -p" . $C_CONTRASENA .
                " -r \"" . $C_RUTA_ARCHIVO . "\" 2>&1";

        //ejecutamos  
        system($command);

        //comprimimos  
        if ($C_COMPRIMIR_MYSQL == 'true') {
            system('bzip2 "' . $C_RUTA_ARCHIVO . '"');
        }
    }

}

?>
