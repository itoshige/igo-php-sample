# igo-php-sample
姓名分割されていない漢字氏名を、igo-phpを利用して分割し、フリガナ予測を行います。


<br />

## 導入方法
* 詳細は、[igo-php](https://github.com/siahr/igo-php/tree/138ee9689c1dc8bf066049c65d9582fbfe34b851)を参照

1.[igo-0.4.5.jar](https://ja.osdn.net/projects/igo/releases/55029)をダウンロードする

2.[mecab-ipadic](https://sourceforge.net/projects/mecab/files/mecab-ipadic/2.7.0-20070801/)をダウンロードする

3.1.2.を利用して、下記コマンドを実行する

```
java -cp igo-0.4.5.jar net.reduls.igo.bin.BuildDic ipadic mecab-ipadic-2.7.0-20070801 EUC-JP
# ipadic/ が生成される → 自身のphpプロジェクトに配置する
```

4. igo-phpを取得する

```
git clone https://github.com/siahr/igo-php.git
# igo-php/lib/　を自身のphpプロジェクトに配置する
```

<br />

## 実行方法
* [igo-php](https://github.com/siahr/igo-php/tree/138ee9689c1dc8bf066049c65d9582fbfe34b851)の(2) PHPプログラムから呼び出す場合を参照
* 動作を確認したい場合は、[igo-php-sampleコード](https://github.com/itoshige/igo-php-sample/tree/master/test)を実行

```
# 実行例
cd igo-php-sample/test/

php FuriganizerTest1.php
→以下のように、姓と名の間に半角スペースを入れて出力
田中 洋子,タナカ ヨウコ

## 姓と名の間にスペースがない場合の正解率を出力
php FuriganizerTest2.php
→以下のように、正解のひらがなとigo-phpが出力したひらがなを比較し正解数を、正解率として出力、正解の場合は右端に○を記載
...
[expected]kanji:松元勇二 kana:マツモト ユウジ   [mesured]kanji:松元 勇二 kana:マツモト ユウジ    ○
正解率:71.75	正解数:287	母数:400
```

<br />

## 備考
### mecab-ipadic-neologdを利用する
#### 注意点
* 精度はさらに向上するが、十分なメモリを確保しないと実行できない

#### 導入方法
* [igo-pythonでmecab-ipadic-neologdをつかう](https://qiita.com/zabeth129/items/0d39e94862cb558015f0)を参考

### 姓名辞書を追加する
* 準備中

### ご利用について
* 当サンプルはいかなる保証もおこなっておりません。
* 当サンプルをご利用時は、利用者の責任においてご利用ください。

### テストデータ
精度確認用に下記ツールを利用して、テストデータを生成しました。
* [疑似個人情報生成 - 生成条件入力](https://hogehoge.tk/personal/generator/?)

<br />

## Licence
* MIT
