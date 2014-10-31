<?php
namespace Site;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Application;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR,
             array($this,
             'handleControllerNotFoundAndControllerInvalidAndRouteNotFound'), 100);
    }
      
    public function handleControllerNotFoundAndControllerInvalidAndRouteNotFound(MvcEvent $e)
    {
        $error  = $e->getError();
        if ($error == Application::ERROR_CONTROLLER_NOT_FOUND) {
            //there is no controller named $e->getRouteMatch()->getParam('controller')
            $logText =  'The requested controller '
                        .$e->getRouteMatch()->getParam('controller'). '  could not be mapped to an existing controller class.';
            
            $sm = $e->getApplication()->getServiceManager();
            $pagesContent = new \Front\Pages\ControlContent($sm, $e->getRequest()->getRequestUri(), __NAMESPACE__);
            
            if($pagesContent->checkPageFileSystem()) {
                echo $pagesContent->getContent(); 
                exit();
            }
               
        }
    } 
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/services.config.php';
    }
}
