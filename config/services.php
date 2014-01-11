<?php
return (new Zend\ServiceManager\ServiceManager)
->setService('parameters', include 'parameters.php')
->setFactory('view', function($sm) {
    $view = new Phly\Mustache\Mustache;
    $view->setTemplatePath($sm->get('parameters')['view']['template_path']);
    return $view;
});
