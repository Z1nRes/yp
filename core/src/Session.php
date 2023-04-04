<?php

namespace src;

class Session
{
   public static function set($id, $value): void
   {
       $_SESSION[$id] = $value;
   }

   public static function get($id)
   {
       return $_SESSION[$id] ?? null;
   }

   public static function clear($id)
   {
       unset($_SESSION[$id]);
   }
}
