<?php
return (new Zend\ServiceManager\ServiceManager)
->setService('Config', include 'parameters.php')
->setFactory('view', function($sm) {
    $view = new Phly\Mustache\Mustache;
    $view->setTemplatePath($sm->get('Config')['view']['template_path']);
    return $view;
});
