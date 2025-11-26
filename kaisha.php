	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用
	
		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

<title>腕時計 シニアから若い方まで Best My Watch 会社概要</title>
<meta name="Description" content="腕時計販売のBest My Watch 会社概要　弊社概要について記載しております、必ずご覧下さい" />
<meta name="Keywords" content="腕時計,販売,セイコー" />

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
<h2 class="h2_midashi_2">会社概要</h2>
<ul>
<li>弊社は今まで業務システム、インターネットのサイト構築、インターネット通信販売システムの製作・開発に従事して参りました。</li>

<li>PCの通信販売システムを5案件、携帯の通信販売システムを3案件の実績があり、またサイトの保守・運用の経験も積み重ねて来ました。</li>

<li>当サイトはサーバー、デザイン、システムに至る全てを自社内で製作・開発しております。某時計卸会社とのコラボレーションにより当サイトを公開するに至りました。</li>

<li>弊社の従来の業務と合わせて本販売サイトもよろしくお願いいたします。</li>

<table class="ta1 mb1em">
<tr>
<td>会社名</td><td>MSweb http://ms-system-design.biz/</td>
</tr>
<tr>
<td>住所</td><td>大阪市平野区背戸口3-3-15 背戸口シャルマン403号</td>
</tr>
<tr>
<td>電話番号</td><td>06-6701-2679</td>
</tr>
<tr>
<td>ファックス番号</td><td>06-6701-2679</td>
</tr>
<tr>
<td>代表者</td><td>税所　正彦　(サイショ　マサヒコ)</td>
</tr>
<tr>
<td>事業内容</td><td>インターネット通信販売<br>時計の仕入れ・販売<br>インターネット・コンサルティング<br>WEBサイト構築<br>WEBデザイン製作<br>WEBシステム開発<br>
サーバー構築・保守管理</td>
</tr>
<tr>
<td>設立年月日</td><td>1996年7月</td>
</tr>
</table>

<br>

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
