<?php
require_once(dirname(__DIR__)  . '/Furiganizer.php');

/**
 * テスト用のCSVファイルとigo-phpの予測値を比較するクラス
 */
class FuriganizerTest {
    
    /**
     * 期待値と実測値を比較し、正解率を出力する
     * 
     * @param $file
     */
    public function assertCsV($file) {
        $furiganizer = new Furiganizer();
        $size = 0; //ファイルの行数
        
        $correct = 0; //正解数
        
        $csv = new SplFileObject(__DIR__ . '/' . $file, 'r');
        $csv->setFlags(SplFileObject::READ_CSV);
        
        foreach ($csv as $expected) {
            if (is_null($expected[0])) continue;
            $size++;
            
            $mesured = explode(',', $furiganizer->furiganize($expected[0]));
                        
            print("[expected]kanji:". $expected[0]. " kana:". $expected[1]. "   [mesured]kanji:". $mesured[0]. " kana:". $mesured[1]);

            if(strcmp($expected[1], $mesured[1]) == 0) {
                $correct++;
                $this->println("    ○");
            } else {
                $this->println("");
            }
        }
        $this->println("正解率:" . (double) $correct * 100 / $size . "	正解数:" . $correct . "	母数:" . $size);
    }
    
    /**
     * 改行を入れる
     */
    private function println($value){
        echo($value . "\n");
    }
}