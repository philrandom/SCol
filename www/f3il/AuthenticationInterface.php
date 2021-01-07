<?php
namespace f3il;

interface AuthenticationInterface
{
    public static function auth_getCredentialsInfos();

    public static function auth_getUserByLogin($login);

    public static function auth_getUserById($id);
}