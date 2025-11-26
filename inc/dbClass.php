<?php
	/**
	*共通モジュール データベース接続、切断モジュール
	*MSweb 税所　正彦(サイショ　マサヒコ)
	*大阪商工会議所会員　K-03-00102885
	*〒547-0034
	*大阪市平野区背戸口3-3-15-403号
	*TEL/FAX 06-6701-2679
	*携帯電話 090-9615-8045
	*http://msweb.biz/
	*msweb@msweb.biz
	*変更日：
	*@package /inc/
	*@subpackage モジュール
	*@version 1.0
	*使用
	*/
	
	// ----------------データベース接続、切断モジュール PostgreSQL
	//----------------------------------------下記をスーバークラスにしてテンプレート化すること
	class DbConnect{ 
		
		// local設定
		var $hostname_local 	= "";		// ホスト名(必要に応じて継承先でオーハーライド)
		var $dbname_local 		= "";		// データベース名(必要に応じて継承先でオーハーライド)
		var $user_local			= "";		// ユーザー名(必要に応じて継承先でオーハーライド)
		var $password_local		= "";		// パスワード(必要に応じて継承先でオーハーライド)
		
		// サーバー環境
		var $hostname_server 	= "";		// ホスト名(必要に応じて継承先でオーハーライド)
		var $dbname_server 		= "";		// データベース名(必要に応じて継承先でオーハーライド)
		var $user_server		= "";		// ユーザー名(必要に応じて継承先でオーハーライド)
		var $password_server	= "";		// パスワード(必要に応じて継承先でオーハーライド)
		
		
		var $con 		= false;	// コネクションハンドル

		function DbConnect(){	// -----------------------------------コンストラクタ // class DbConnect
			$this->getConnection();
		}

		function getConnection(){ //----------------------------------コネクションハンドルを返す // class DbConnect
			if ( $this->con == false ){
				return ( $this->doConnect());
			}
		return ( $this->con );
		}

		function doConnect(){ // --------------------------------------データベースに接続する // class DbConnect
			// 

			$ADDR = $_SERVER['REMOTE_ADDR'];

			if ( $ADDR == '127.0.0.1'){ // localの場合
				@$this->con = pg_connect ( "host=$this->hostname_local dbname=$this->dbname_local user=$this->user_local password=$this->password_local" );
			}
			else{						// サーバーの場合
				@$this->con = pg_connect ( "host=$this->hostname_server dbname=$this->dbname_server user=$this->user_server password=$this->password_server" );
			}

//			pg_set_client_encoding($this->con, 'SJIS'); // クライアント・エンコーディングをsjis
			
			if ( $this->con == false ){
				print "データベース $this->dbname に接続できませんでした。";
				exit;
			}
			return ( $this->con );
		}

		function doClose(){ 
			if ( $this->con != false ){// ---------------------------データベース切断 // class DbConnect
				pg_close ( $this->con);
				$this->con = false;
			}
		}
	}
	
	class DbConnectChrono extends DbConnect{ 
		
		// local設定
		var $hostname_local 	= "localhost";						// ホスト名(必要に応じて継承先でオーハーライド)
		var $dbname_local 		= "chrono";				// データベース名(必要に応じて継承先でオーハーライド)
		var $user_local			= "postgres";						// ユーザー名(必要に応じて継承先でオーハーライド)
		var $password_local		= "";								// パスワード(必要に応じて継承先でオーハーライド)
		
		// サーバー環境
		var $hostname_server 	= "localhost";					// ホスト名(必要に応じて継承先でオーハーライド)
		var $dbname_server 		= "chrono";				// データベース名(必要に応じて継承先でオーハーライド)
		var $user_server		= "postgres";						// ユーザー名(必要に応じて継承先でオーハーライド)
		var $password_server	= "";								// パスワード(必要に応じて継承先でオーハーライド)
		
	}
	
// ############################################################ トランザクション処理　コードです、クラスではありません

		// 使用方法、begin
		//
		// 		require_once('../../../../inc/module.php'); // システム共通モジュール
		// 		$DbConnect = new DbConnect;
		//		$DbConnect->doConnect();
		
		//		$con = $DbConnect->getConnection(); // コネクションハンドル
		//		pg_query($con, "begin"); // トランザクションの開始
		
		// 使用方法、commit
		//
		// 		pg_query($con, "COMMIT"); // トランザクションの終了（確定）

		
// ############################################################
		
	// MYsqlの接続、切断クラス
	//-----------------テンプレート]
	class MysqlDbConnect{ 
		
		var $host 			= "";
		var $id				= "";
		var $passwd			= "";
		var $data_base		= "";
		
		
		//--------------接続メソッド
		function MysqlDbConnectMe(){
			
			mysql_connect( $this->host , $this->id , $this->passwd );
			mysql_select_db( $this->data_base );
			
		}
		//--------------切断メソッド
		function MysqlDbCloseMe(){
			mysql_close();
		}
	}
	
	class MysqlDbConnectAcess extends MysqlDbConnect{
		
		var $host 			= "localhost";
		var $id				= "root";
		var $passwd			= "";
		var $data_base		= "region";
	}
	
//	トランザクション

//---------------開始宣言
//	mysql_query(BEGIN);
	
//--------------コミット
//	mysql_query(COMMIT);

?>