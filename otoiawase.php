	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用
		require_once('./inc_sys/module_sys.php'); // システム共通モジュール、システム限定
	
		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

<title>腕時計 シニアから若い方まで Best My Watch お問い合わせ</title>
<meta name="Description" content="腕時計販売のBest My Watch お問い合わせ" />
<meta name="Keywords" content="腕時計,販売,セイコー" />

<SCRIPT LANGUAGE="JavaScript" type="text/JavaScript">
<!--
	function nyuryoku_shori( NAME , MAIL , BUNMEN ){

 		if 	( document.form2.NAME.value == "" || document.form2.MAIL.value == "" || document.form2.BUNMEN.value == "" ) { 
 			alert("入力項目が不足しています、画面を確認して下さい。"); 
 			return false; 
 		}
  	}
 
  //-->
</SCRIPT>


	<?php
		// ヘッダー部分-2
		$coad->coadHeader_2();
	?>

	<?php
		// ヘッダー部分-3
		$coad->coadHeader_3();
	?>

<body>
<?php include_once("./inc_sys/analyticstracking.php") ?>

	<?php
		// ロゴ表示
		$coad->logo();
	?>

<div id="wrapper">
<div id="contents">

<!--　ページの中央部分　-->
<div id="column1">    
<div id="column1_inner">
      
	<?php
		// 上部メイン・リンク
		$coad->mainLink();
	?>

<div id="topcontent">
<img src="images/title.jpg" alt="タイトル画像">
</div>
       
<!-----------------------------メイン・コンテンツ------ここから---------------->         
<article>
<h2 class="h2_midashi_2">お問い合わせ</h2>
<ul>

<section>

<FORM ACTION="otoiawase_control.php" METHOD="POST" name="form2" form onsubmit="return nyuryoku_shori()">


<table class="ta1 mb1em">
<tr>

<th colspan="2" class="tamidashi">※マークは入力必須です</th>

</tr>

<tr>
<th>問い合わせ区分</th>
<td>
<select name="KUBUN" class="form_type">
<option>ご要望</option>
<option>初期不良</option>
<option>クレーム</option>
<option>キャンセル</option>
<option>ご質問</option>
<option>その他</option>
</select>
</td>
</tr>

<tr>
<th>お名前※</th>
<td><input type="text" name="NAME" size="30" class="ws"></td>
</tr>

<tr>
<th>ご住所</th>
<td><input name="ADRESS" type="text" size="45" class="ws"></td>
</tr>

<tr>
<th>お電話便号</th>
<td>
<input name="TEL" type="text" size="10" class="ws">
</td>
</tr>

<tr>
<th>メールアドレス※</th>
<td>
<input name="MAIL" type="text" size="10" class="ws">
</td>
</tr>

<tr>
<th>お問い合わせ内容※</th>
<td>
<textarea name="BUNMEN" cols="30" rows="10" class="wl"></textarea>
</td>
</tr>
</table>

<p class="c">
<input type="submit" value="内容を送信します">
</p>

</section>
</form>


<!-----------------------------メイン・コンテンツ------ここまで---------------->         

	<?php
		// -特定商取引に関する法律に基づく表示）
		$coad->tokutei();
	?>

</ul>
</article>
  
<!-- / #column1_inner -->
</div>
<!--column1-->
</div>
    
<!--　ページの左部分　-->
<div id="sidebar">
    
	<?php
		// ロゴ（ページ左上のサイト名）
		$coad->logo_2();
	?>

      
<!-- / #sidebar -->
</div>
<!-- / #contents -->
</div>
<!--　ページの右部分　-->
<div id="column2">

	<?php
		// ページの右部分
		$coad->right();
	?>

</div>
    
<!-- / #column2 -->
</div>
 
<!--　ページの下部分　-->
	<?php
		// ページの右部分
		$coad->footer();
	?>
  
<!-- / #wrapper -->
</div>

	<?php
		// javascript
		$coad->javascript();
	?>

	<?php
		// /body /html 
		$coad->endBodyHtml();

		$DbConnect->doClose(); // データベースを切断します			

	?>
