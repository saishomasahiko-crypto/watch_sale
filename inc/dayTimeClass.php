<?php
	/**
	*共通モジュール 年月日、時間、曜日に関するモジュール
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
	
//######################################################################月数、日数、曜日などのデータ######################################
	class puldownItem{ // -------------------------------------------------------------------------------------------------------------------プルダウン・クラス

		function Tsuki(){ // 月項目メソッド class puldownItem　プルダウンの項目を出力します

			print "<option value=\"01\">01</option>\n";
			print "<option value=\"02\">02</option>\n";
			print "<option value=\"03\">03</option>\n";
			print "<option value=\"04\">04</option>\n";
			print "<option value=\"05\">05</option>\n";
			print "<option value=\"06\">06</option>\n";
			print "<option value=\"07\">07</option>\n";
			print "<option value=\"08\">08</option>\n";
			print "<option value=\"09\">09</option>\n";
			print "<option value=\"10\">10</option>\n";
			print "<option value=\"11\">11</option>\n";
			print "<option value=\"12\">12</option>\n";

		}
	
		function Hi(){ // ---------------------------------------------------------------検索画面日項目メソッド class puldownItem　プルダウンの項目を出力します

			print "<option value=\"01\">01</option>\n";
			print "<option value=\"02\">02</option>\n";
			print "<option value=\"03\">03</option>\n";
			print "<option value=\"04\">04</option>\n";
			print "<option value=\"05\">05</option>\n";
			print "<option value=\"06\">06</option>\n";
			print "<option value=\"07\">07</option>\n";
			print "<option value=\"08\">08</option>\n";
			print "<option value=\"09\">09</option>\n";
			print "<option value=\"10\">10</option>\n";
			print "<option value=\"11\">11</option>\n";
			print "<option value=\"12\">12</option>\n";
			print "<option value=\"13\">13</option>\n";
			print "<option value=\"14\">14</option>\n";
			print "<option value=\"15\">15</option>\n";
			print "<option value=\"16\">16</option>\n";
			print "<option value=\"17\">17</option>\n";
			print "<option value=\"18\">18</option>\n";
			print "<option value=\"19\">19</option>\n";
			print "<option value=\"20\">20</option>\n";
			print "<option value=\"21\">21</option>\n";
			print "<option value=\"22\">22</option>\n";
			print "<option value=\"23\">23</option>\n";
			print "<option value=\"24\">24</option>\n";
			print "<option value=\"25\">25</option>\n";
			print "<option value=\"26\">26</option>\n";
			print "<option value=\"27\">27</option>\n";
			print "<option value=\"28\">28</option>\n";
			print "<option value=\"29\">29</option>\n";
			print "<option value=\"30\">30</option>\n";
			print "<option value=\"31\">31</option>\n";

		}

		var $sun = "sun";
		var $mon = "mon";
		var $tue = "tue";
		var $wed = "wed";
		var $thi = "thi";
		var $fri = "fri";
		var $sut = "sut";

		var $sunValue = "日曜日";
		var $monValue = "月曜日";
		var $tueValue = "火曜日";
		var $wedValue = "水曜日";
		var $thiValue = "木曜日";
		var $friValue = "金曜日";
		var $sutValue = "土曜日";

		function sunFlug(){ // -------------------------------------------日曜日のフラグを返す class puldownItem
			return $this->sun;
		}

		function monFlug(){ // -------------------------------------------月曜日のフラグを返す class puldownItem
			return $this->mon;
		}

		function tueFlug(){ // -------------------------------------------火曜日のフラグを返す class puldownItem
			return $this->tue;
		}

		function wedFlug(){ // -------------------------------------------水曜日のフラグを返す class puldownItem
			return $this->wed;
		}

		function thiFlug(){ // -------------------------------------------木曜日のフラグを返す class puldownItem
			return $this->thi;
		}

		function friFlug(){ // ------------------------------------------金曜日のフラグを返す class puldownItem
			return $this->fri;
		}

		function sutFlug(){ // --------------------------------------------土曜日のフラグを返す class puldownItem
			return $this->sut;
		}

		//-------

		function sunValue(){ // ------------------------------------------日曜日のデータを返す class puldownItem
			return $this->sunValue;
		}

		function monValue(){ // -------------------------------------------月曜日のデータを返す class puldownItem
			return $this->monValue;
		}

		function tueValue(){ // ------------------------------------------火曜日のデータを返す class puldownItem
			return $this->tueValue;
		}

		function wedValue(){ // ------------------------------------------水曜日のデータを返す class puldownItem
			return $this->wedValue;
		}

		function thiValue(){ // -------------------------------------------木曜日のデータを返す class puldownItem
			return $this->thiValue;
		}

		function friValue(){ // ------------------------------------------金曜日のデータを返す class puldownItem
			return $this->friValue;
		}

		function sutValue(){ // ---------------------------------------------土曜日のデータを返す class puldownItem
			return $this->sutValue;
		}

		function weekPuldown(){ // ------------------------------------------------------------------------------------class puldownItem　曜日の項目を出力します
			print "<option value = \"$this->mon\">月</option>$this->monValue\n";
			print "<option value = \"$this->tue\">火</option>$this->monValue\n";
			print "<option value = \"$this->wed\">水</option>$this->tueValue\n";
			print "<option value = \"$this->thi\">木</option>$this->wedValue\n";
			print "<option value = \"$this->fri\">金</option>$this->thiValue\n";
			print "<option value = \"$this->sut\">土</option>$this->friValue\n";
			print "<option value = \"$this->sun\">日</option>$this->sunValue\n";
		}
	}
	
	//--------------------------------------------------------------------puldownItemクラスここまで
	
//###################################################################### 日付時間取得クラス ###############################################################

	class day{ // 日付時間取得クラス
		function dateTimeAll(){ // ----------------------------------------------------------------------------------日付時間メソッド // class day
			$dateTimeAll = date("Y-m-d H:i:s");
			return($dateTimeAll);
		}
		function date(){ // -----------------------------------------------------------------------------------------日付メソッド // class day
			$date = date("Y-m-d");
			return($date);
		}
		function year(){ // -----------------------------------------------------------------------------------------年だけの取得
			$year = date("Y");
			return($year);
		}
		function nen_tsuki(){ // ------------------------------------------------------------------------------------年月だけを取得
			$nen_tsuki = date("Y-m");
			return($nen_tsuki);
		}
		function TimeAll(){ // ------------------------------------------------------------------------------------時間、分、秒だけを取得
			$TimeAll = date("H:i:s");
			return($TimeAll);	
		}
	}

?>