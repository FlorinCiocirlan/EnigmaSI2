<?php


interface Cipher
{
    function encrypt($message);
    function decrypt($message);
}