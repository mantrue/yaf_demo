<?php
/**
 * Medoo Model
 * @author Lancer He <lancer.he@gmail.com>
 * @since  2014-09-15
 */
namespace Core\Model;

class Medoo {

    protected static $_medoo = null;

    public function __construct() {
        if ( ! is_null( self::$_medoo ) ) {
            return self::$_medoo;
        }

        $config = new \Yaf\Config\Ini( APPLICATION_PATH . '/conf/mysql.ini', \Yaf\ENVIRON);

        self::$_medoo = new \Medoo\Medoo([
            'database_type' => $config->database_type,
            'database_name' => $config->database_name,
            'server'        => $config->server,
            'username'      => $config->username,
            'password'      => $config->password,
            'port'          => $config->port,
            'charset'       => $config->charset,
        ]);

        return self::$_medoo;
    }
}