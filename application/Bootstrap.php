<?php
use Yaf\Application;
use Yaf\Dispatcher;
use Yaf\Bootstrap_Abstract;
use Yaf\Loader;

/**
 * @name Bootstrap
 */
class Bootstrap extends Bootstrap_Abstract
{
    public function _initConst( Dispatcher $dispatcher ) {
        define('APPLICATION_CORES_PATH',    APPLICATION_PATH . '/application/cores');
        define('APPLICATION_SERVICES_PATH', APPLICATION_PATH . '/application/service');
        define('APPLICATION_JOB_PATH', APPLICATION_PATH . '/application/job');
        define('APPLICATION_CONSOLE_PATH', APPLICATION_PATH . '/application/console');
    }

    //加载composer
    public function _initAutoload( Dispatcher $dispatcher) {
        require __DIR__ . "/../vendor/autoload.php";

        Loader::getInstance()->import(APPLICATION_CORES_PATH . '/ClassLoader.php');

        $autoload = new \Core\ClassLoader();

        $autoload->addClassMap(array(
            'Service' => APPLICATION_SERVICES_PATH,
            'Core'    => APPLICATION_CORES_PATH,
            'Job'    => APPLICATION_JOB_PATH,
            'Console'    => APPLICATION_CONSOLE_PATH,
        ));
        spl_autoload_register(array($autoload, 'loader'));
        $dispatcher->autoload = $autoload;
    }

    public function _initConfig( Dispatcher $dispatcher ) {

    }

    public function _initPlugin(Dispatcher $dispatcher) {
        //注册一个插件
    }

    public function _initRoute(Dispatcher $dispatcher) {
        //在这里注册自己的路由协议,默认使用简单路由
    }

    public function _initView(Dispatcher $dispatcher) {
        //在这里注册自己的view控制器，例如smarty,firekylin
    }
}