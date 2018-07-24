<?php
require_once(dirname(__DIR__)  . '/Furiganizer.php');
require_once(__DIR__  . '/FuriganizerTestModule.php');

// 珍しい名字、名前の正解率を出力（精度がよくない）
$test = new FuriganizerTest();
$test->assertCsv('kanji2kana-wspace-rarename.csv');