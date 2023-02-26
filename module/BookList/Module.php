<?php
namespace BookList;
use BookList\Model\Book;
use BookList\Model\BookTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {
    public function onBootstrap(MvcEvent $e)
    {
         $eventManager        = $e->getApplication()->getEventManager();
         $moduleRouteListener = new ModuleRouteListener();
         $moduleRouteListener->attach($eventManager);


        $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator->setLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            ->setFallbackLocale('en_US');

    }
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );

    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'BookList\Model\BookTable' =>  function($sm) {
                    $tableGateway = $sm->get('BookTableGateway');
                    $table = new BookTable($tableGateway);
                    return $table;
                },
                'BookTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Book());
                    return new TableGateway('book', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}
