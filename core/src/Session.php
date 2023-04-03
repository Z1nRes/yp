<?php

namespace src;

class Session
{
   public static function set($role, $value): void
   {
       $_SESSION[$role] = $value;
   }

   public static function get($role)
   {
       return $_SESSION[$role] ?? null;
   }

   public static function clear($role)
   {
       unset($_SESSION[$role]);
   }
}
