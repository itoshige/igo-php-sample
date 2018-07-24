<?php
require_once(dirname(__DIR__)  . '/Furiganizer.php');
require_once(__DIR__  . '/FuriganizerTestModule.php');

// 姓と名の間にスペースがない場合の正解率を出力
$test = new FuriganizerTest();
$test->assertCsv('kanji2kana-wospace.csv');