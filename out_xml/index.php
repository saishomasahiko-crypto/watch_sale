<!-------------------------- g-shockの処理のみべたでコード変更しています　時間節約のため-------------------------------------->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<title>サイト・マップ書き出しスクリプト画面</title>
</head>

<body>

単体商品のサイトマップ

<!-------------------------- 単体データ-------------------------------------->
<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">

<font size=2>フォーマット選択</font> <br>

<input type="radio" name="MAP" value="pc" checked />

<font size=2>GooglePC用サイト・マップ</font><br />

<input type="radio" name="MAP" value="mobile" />

<font size=2>Google携帯用サイト・マップ</font> 
<p>
<font size=2>サイト選択</font> <br />


<input type="radio" name="URL" value="http://best-my-watch.net/tantai_control.php?SHOUHIN=" checked /><font size=2>best-my-watch.net</font> 
<br><input type="radio" name="URL" value="http://bag.best-my-shop.biz/tantai/control/tantai_control.php?SHOUHIN=" /><font size=2>bag.best-my-shop.biz</font> 
<br><input type="radio" name="URL" value="http://best-my-saifu.biz/tantai/control/tantai_control.php?SHOUHIN=" /><font size=2>best-my-saifu.biz</font> 

<br />

<!--
読込対象データベース<br />

<input type="text" name="DATABASE" />
<br />
-->
<br />

<font size=2>商品コード選択</font> 
<br><input type="radio" name="SQL_BUN" value="select shouhin_id from all_b_etc_t" checked /><font size=2>shopバッグ・コード・データ取得　次期開発予定</font> 
<br><input type="radio" name="SQL_BUN" value="select shouhin_id from all_shouhin_t where sh_maker = 'CASIO-G-SHOCK'" /><font size=2>腕時計商品コード・データ取得</font> 
<br><input type="radio" name="SQL_BUN" value="select shouhin_id from saifu_t" /><font size=2>財布商品コード・データ取得</font> 

<br>
<input type="submit" name="SUBMIT" value="単品商品情報" />
</form>

<hr>
パソコン・サイト

<!-------------------------- best-my-watch.net ブランドカテゴリ・リンク-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="best-my-watch" />
<input type="submit" name="SUBMIT" value="best-my-watch.net ブランドカテゴ・リンク" />
</form>

<!-------------------------- my-shop.msweb ブランドカテゴリ・リンク-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="my-shop" />
<input type="submit" name="SUBMIT" value="my-shop.msweb ブランドカテゴ・リンク" />
</form>

<!-------------------------- osaifu-net ブランドカテゴリ・リンク-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="osaifu" />
<input type="submit" name="SUBMIT" value="osaifu ブランドカテゴ・リンク" />
</form>

<hr>
携帯サイト 使用保留

<!-------------------------- best-my-watch.net リスト・ページ-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="best-my-watch_list" />
<input type="submit" name="SUBMIT" value="best-my-watch.net リスト・ページ" />
</form>

<!-------------------------- keitai-my-shop リスト・ページ-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="keitai-my-shop_list" />
<input type="submit" name="SUBMIT" value="keitai-my-shop リスト・ページ" />
</form>

<!-------------------------- mobile-osaifu リスト・ページ-------------------------------------->

<form name="form1" id="form1" method="post" action="./control/out_xml_control.php">
<input type="hidden" name="SHORI" value="mobile-osaifu_list" />
<input type="submit" name="SUBMIT" value="mobile-osaifu リスト・ページ" />
</form>

</body>
</html>
