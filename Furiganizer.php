<?php
require_once(__DIR__ . '/igo-php/lib/Igo.php');
define('DELIMITER', ',');

/**
 * 姓名分割クラス
 */
class Furiganizer {
    private $igo;

    public function __construct() {
        $this->igo = new Igo(__DIR__ ."/ipadic", "UTF-8");
    }

    /**
     * 姓名分割されていない漢字氏名をigo-phpを使用して分割、予測したフリガナを返却する
     */
    public function furiganize($kanjiname) {

        if($this->isEmpty($kanjiname))
            return '';

        // 全角スペースを半角スペースへ変換してtrim
        $name = trim(mb_convert_kana($kanjiname, 's', 'UTF-8'));

        // 品詞情報なども合わせて取得する
        $result = $this->igo->parse($name);

        $kanji = $kana = '';

        foreach($result as $seimei) {
            if($this->isEmpty($seimei))
                continue;

            // 漢字
            $kanji .= $seimei->surface . DELIMITER;

            // フリガナ
            $features = $seimei->feature;


            $furigana = rtrim($seimei->surface, ',');

            // 漢字氏名に英数字が含まれていない場合
            if (!preg_match("/[a-zA-Z0-9]/", $furigana)) {
                $furigana = isset(explode(',', $features)[7]) ? explode(',', $features)[7] : $furigana;
            }

            $kana .= $furigana . DELIMITER;
        }

        return rtrim($kanji, ',') . ':' . rtrim($kana, ',');
    }

    /**
     * null、半角または全角スペースか判定する
     *
     * @param $value
     * @return boolean
     */
    private function isEmpty($value) {
        return $value === null || (is_string($value) && preg_match('/^( |　)+$/', $value) === 1 );
    }
}
?>
