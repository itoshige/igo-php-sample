<?php
require_once(dirname(__DIR__)  . '/Furiganizer.php');
require_once(__DIR__  . '/FuriganizerTestModule.php');

// 実行
$furiganizer = new Furiganizer();
echo($furiganizer->furiganize('　山田　太郎　'));