<?php		
	class clDBUtility{
	
		function __construct()
		{				
		}
		
		private static $dbConn = null;
		public static function connectDatabase(){	
			if(clDBUtility::$dbConn == null){
				$dbTempConn = new mysqli('localhost', 'comSysAdmin', 'Manager', 'community');
				//$dbTempConn = new mysqli('localhost', 'root', 'Manager', 'community');
				if (!$dbTempConn) {
					throw new Exception('Could not connect to database server');
				} else {
					clDBUtility::$dbConn = $dbTempConn;
					return $dbTempConn;
				}
			}else{
				return clDBUtility::$dbConn;
			}
			
		}	

		public static function closeConnection(){
			if(clDBUtility::$dbConn){
				clDBUtility::$dbConn->close();
			}
		}
	}	
?>