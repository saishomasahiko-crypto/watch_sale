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

<title>腕時計 シニアから若い方まで Best My Watch プライバシー・ポリシー</title>
<meta name="Description" content="腕時計販売のBest My Watch プライバシー・ポリシー" />
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
<h2 class="h2_midashi_2">プライバシー・ポリシー</h2>

<ul>
<li>●収集する個人情報について</li>
<li>当サイトをご利用の上でご提供いただく情報は、個人の特定が可能である情報が主になります。 
<li>お名前、郵便番号、住所、電話番号、メールアドレス</li>
<li>上記の情報はサービスを提供する上で最低限必要な情報であり、上記以外の情報に関しましてはお客様の任意でご提供いただくものです。</li>

<li>●収集の目的と利用</li>
<li>best-my-watch.net では、ご提供いただいた情報は以下に掲げる場合に限り使用するものといたします。</li>
<li>当サイトでのサービスの提供及び、よりよいサービスを提供することを目的とした統計・分析の実施 。</li>
<li>ご購入いただいた商品の配送に関して、お届け先情報を外部の運送会社と共有。</li>
<li>当サイトからのお知らせ、ニュース、広告等の配信をご希望する場合。</li>

<li>●情報のセキュリティ－について</li>
<li>当サイトでは、お客様の情報を万全の管理体制のもと、情報の保護に努めています。</li>
<li>情報をご提供いただく際、SSLを使用しまた、業務上必要な場合において社内の限られた従業員においてのみ個人、情報へのアクセスが許可されています。</li>

<li>●変更の通知</li> 
<li>best-my-watch.net では、上記プライバシーポリシーを変更、改定することがあります。</li>
<li>その場合は、当サイト内のプライバシーポリシーのページ上で行います。</li>
<li>当サイトにおけるプライバシーポリシーに関する疑問、質問に関しましてはmsweb@msweb.biz よりお問合せ下さい 。</li>

<li>●情報の開示 </li>
<li>下記の場合を除き、ご本人の同意無く無断で第三者に個人情報を開示することはございません。</li>
<li>警察、検察、その他政府機関など法律や条令で認められた権限を有する機関より適法な手順により情報の提出依頼　、照会があった場合、
個人情報の開示を行うことがあります。</li>

<li>●Cookieについて 
<li>当サイトでは『Cookie（クッキー）』と呼ばれる機能を利用しております。</li>
<li>ブラウザ側で、Cookieを拒否することもできますが、当サイトで使用しているCookieはお客様のプライバシーを侵害するものではなく、
またアクセスしているコンピューターに悪影響を及ぼすものでもございません。</li>
<li>Cookieを拒否することによって当サイトを閲覧できなくなるといったことはございませんが、一部のサービスをご利用い
<li>ただくことができなくなりますので、当サイトをご利用の際はブラウザ側のCookie機能をONにしてご利用下さい。</li>

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
