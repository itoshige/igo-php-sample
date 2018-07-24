 <?php
 require_once(__DIR__ . '/igo-php/lib/Igo.php');
define('DELIMITER', ' ');

/**
 * 姓名分割クラス
 */
class Furiganizer {
    private $igo;
    
    public function __construct() {
        $this->igo = new Igo(__DIR__ ."/ipadic", "UTF-8");
    }
    
    /**
     * 姓名分割されていない漢字氏名をkuromojiを使用して分割、予測したフリガナを返却する
     */
    public function furiganize($kanjiname) {
        
        if($this->isEmpty($kanjiname))
            return '';
        
        // 全角スペースを半角スペースへ変換
            $name = mb_convert_kana($kanjiname, 's');
            
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
            
            
            $furigana = isset(explode(',', $features)[7]) ? explode(',', $features)[7] : $kanji;
            $kana .= $furigana . DELIMITER;
        }
        
        return trim($kanji) . ',' . trim($kana);
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