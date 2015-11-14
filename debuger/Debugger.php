<?php

/**
 * Created by SkyCorp Ltd.
 * User: yarenty
 * Date: 14/11/2015
 * Time: 18:28
 */
class Debugger
{
    var $info = "";

    function add($i)
    {
        $this->info .= $i . "<br/>";
    }

    function get()
    {
        return $this->info;
    }
}

$d = new Debugger();

/**
 * If you want to add some text to be displayed in debug - use this one.
 * @param $txt
 */
function debug($txt)
{
    global $d;
    $d->add($txt);
}

/**
 * Put it somewhere in bottom of your page.
 * Usage:
 * <pre> printDebug(); </pre>
 */
function printDebug()
{
    global $d;
    echo $d->get();
}

/**
 * Gets debug string.
 * @return string
 */
function getDebugInfo()
{
    global $d;
    return $d->get();
}