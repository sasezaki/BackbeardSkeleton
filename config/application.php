<?php
return call_user_func(function () {
    yield '/' => function () {
        $template_path = $this->get('Config')['view']['template_path'];
        ob_start();
        include $template_path.'/index.php';
        $index = ob_get_contents();
        ob_end_clean();
        return $index;
    };
});
