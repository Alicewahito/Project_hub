<?php

class Utils {
    public function generateRandomPassword() {
        $passwordlength= 10;

        $symbols= '~!@#$*%`?[]{};<>?.,_-()';

        $symbolscount= strlen($symbols);

        $randomposition= mt_rand(0, $symbolscount - 1);

        $password= substr($symbols, $randomposition, 1);


        $password .= chr(mt_rand(48,57));


        $password .= chr(mt_rand(65,90));

        while (strlen($password) < $passwordlength)
        {
        $password .= chr(mt_rand(97,122));
        }

        return str_shuffle($password);
    }
}
