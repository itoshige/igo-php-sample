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
*

<br />

## 備考
### mecab-ipadic-neologdを利用する
#### 注意点
* 精度は向上するが、十分なメモリを確保しないと実行できない


### 姓名辞書を追加する

<br />

## Licence
* MIT
