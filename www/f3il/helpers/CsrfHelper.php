<?php
namespace f3il\helpers;

abstract class CsrfHelper
{
    const SESSION_KEY = 'f3il.csrfToken';

    public static function getToken() {
        if(!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = hash('sha256',uniqid());
        }
        return $_SESSION[self::SESSION_KEY];
    }

    public static function csrf() {
        $token = self::getToken();?>
        <input type="hidden" name="<?php echo $token;?>" value="0">
        <?php
    }

    public static function checkToken() {
        if(!isset($_SESSION[self::SESSION_KEY])) return false;
        return filter_has_var(INPUT_POST,$_SESSION[self::SESSION_KEY]);
    }
}