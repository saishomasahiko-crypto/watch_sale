<?php
	/**
	*共通モジュール デバッグ関するモジュール
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
	
	// 配列をフォーマットしてデバッグします
	class arrayPrintR{
		
		function arrayPrintR($Array){
			echo nl2br( print_r( $Array,true ) );	
		}	
	}
	
?>