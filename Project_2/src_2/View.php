<?

class View 
{
    public static function render($template, $vars =[]) {
        extract($vars);
        
        require __DIR__ . '/views/' .  $template . '.php';
    }
}
