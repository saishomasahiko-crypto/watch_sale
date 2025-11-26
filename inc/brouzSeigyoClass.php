<?php
	/**
	*共通モジュール ブラウザー制御クラス
	*MSweb 税所　正彦(サイショ　マサヒコ)
	*大阪商工会議所会員　K-03-00102885
	*〒547-0034
	*大阪市平野区背戸口3-3-15-403号
	*TEL/FAX 06-6701-2679
	*携帯電話 090-9615-8045
	*http://msweb.biz/
	*msweb@msweb.biz
	*変更日：
	*@package /inc
	*@subpackage モジュール
	*@version 1.0
	*
	*/
	
	
//######################################################################## 画面サイズ指定JAVASCRIPT ###################################################
	
	class gamenSize{
		
		function gamenSizeMe( $WIDTH , $HEIGHT ){
		
			print "<SCRIPT LANGUAGE=\"JavaScript\">\n";
				print "window.resizeTo( $WIDTH , $HEIGHT );\n";
				print "window.moveTo(0,0);\n";
			print "</SCRIPT>\n";
		
		}
		
	}
	
//######################################################################## 画面を閉じる　JAVASCRIPT ###################################################

	class gamenClose{
		
		var $close = "";
		
		function gamenCloseMe(){

			print "<A HREF=\"javascript:window.close()\">$this->close</A>\n";
		}
	}

	class gamenCloseTest extends gamenClose{
		var $close = "画面を閉じる";
	}
	
//######################################################################## 指定した時間で自動的にブラウザを閉じる　 #####################################
	// これはサブウインドウで関数などで処理されないと自動で閉じません、直接のブラウザ操作では警告ダイヤグラムが出ます
	
	class autoClose{
		
		var $time = ""; // 閉じるまでの時間を設定1000/1秒単位
		
		function autoCloseMe(){
			
			// bodyタグに記載するのでオプションが必要な場合はサブクラスを作ってください。
			print "<body onLoad=\"setTimeout('this.window.close()',$this->time);\">\n";
		}
	}
	
	class autoCloseTest extends autoClose{
		
		var $time = "3000";
		
	}
	
//####################################################################### csv出力をダウンロードさせる  #####################################


	// 	header出力は一番初めに行うこと、require_onceも例外ではない
	// モジュールからrequire_onceで読み込みができないため一番下の2行のコードを直接コーディングすること
		
	// 以下項目書き出し例、データの区切りにカンマを挿入、行の最後は「\n」を挿入して改行
	// 	print "名前,";
	//	print "住所,";
	//	print "電話番号\n";
	
	// 以下、出力書き出し例
	// 		for ($j = 0 ; $j < $row ; $j++){
	//			$name 			= pg_result($result,$j,0); // 名前
	//			print "name,";

	//			$adress			= pg_result($result,$j,1); // 住所
	//			print "adress,";

	//			$tel			= pg_result($result,$j,2); // 電話番号s
	//			print "tel,";
	//		}
		
	// 以下の2行が対象コードです。
		
 	//	header("Content-disposition: attachment; filename =" . "$file_name.csv");
 	//	header("Content-type: application/octet-stream_rum; name =" . "$file_name.csv");
		


?>