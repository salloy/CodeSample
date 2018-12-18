<?php 
/*****************
    * Data Base Class File
    * @category   Class File
    * @version    $Id: datasbase-class.php V1.0 $
    * @author     Shobhit Srivastav(shobhit833@gmail.com).
	* @createdDate 28th Aug 2017
*****/

class database{
     
    private $dbName = null, $dbHost = null, $dbPass = null, $dbUser = null;
    private static $instance = null;
	protected  static $tablename = '';
    private  $dbDetails = array("db_name"=>"test","db_host"=>"localhost","db_user"=>"root","db_pass"=>"");
    private function __construct($dbDetails = array()) {
		//echo '<pre>';
		//print_r($this->dbDetails);
        // Please note that this is Private Constructor
        $this->dbName = $this->dbDetails['db_name'];
        $this->dbHost = $this->dbDetails['db_host'];
        $this->dbUser = $this->dbDetails['db_user'];
        $this->dbPass = $this->dbDetails['db_pass'];
 		
		
        // Your Code here to connect to database //
		$conn = mysql_connect($this->dbHost,$this->dbHost,$this->dbPass) or die(mysql_error());
		 mysql_select_db($this->dbName)  or die('No Database exist with name'.$this->dbName);
    }
     
    public static function connect($dbDetails = array()) {
         
        // Check if instance is already exists      
        if(self::$instance == null) {
            self::$instance = new database($dbDetails);
        }
         
        return self::$instance;
         
    }
	
	public static function select(){
		$sqlquery = "select * from ".static::$tablename;
		$result = mysql_query($sqlquery);
		return $result;
		
	}
	
	public static function selectwhere($fieldname,$fieldvalue){
		$sqlquery = "select * from ".static::$tablename." where ".$fieldname." = ".$fieldvalue." AND first_name != '' AND last_name != '' AND logo != '' ";
		$result = mysql_query($sqlquery);
		return $result;
		
	}
	
	public static function GetplayerlistData(){
		$sqlquery = "Select pro_team_player.first_name,pro_team_player.last_name,pro_team_player.logo from pro_team_player INNER JOIN pro_team ON pro_team_player.team_id = pro_team.team_id AND pro_team_player.first_name != '' AND pro_team_player.last_name != '' AND pro_team_player.logo != ''";
		$result = mysql_query($sqlquery);
		return $result;
		
	}
	
	
	public static function GetTeamListData(){
		$sqlquery = "select * from ".static::$tablename." where team_name != '' AND  team_logo != ''";
		$result = mysql_query($sqlquery);
		return $result;
		
	}
	
	
	public static function insert($fieldName=NULL,$fieldValues=NULL){
		   $insertquery = "insert into ".static::$tablename."(".$fieldName.") VALUES ("."'".$fieldValues."'".")" ;
		   $result = mysql_query($insertquery);
		   $lastinsertID = self::lastInsertID();
		   if(empty($lastinsertID)){
		   		$error = 'Some error occured in insertion of the data in'.static::$tablename;
  			     throw new Exception($error); 
		   }
		   else{
		   	  return $lastinsertID;	
		   }
	}
	
	public function lastInsertID(){
		 return mysql_insert_id();
	}
	
	public function rooturl(){
		 $rooturl = 'http://localhost/prowareness';
		 return $rooturl;
	}
	
	###htmlentities = Convert some characters to HTML entities: ###
	###stripslashes = Remove Backslash ### 
	
	public function sanitize_data($input_data) 
	{
			$searchArr=array("document","write","alert","%","$",";","+","|","#","<",">",")","(","'","\'",",","<img","src=",".ini","<iframe","java:","window.open","http","!",":boot",".com",".exe",".php",".js",".txt","@",".css");	
			$input_data	= 	str_replace("script","",$input_data);
			$input_data	= 	str_replace("iframe","",$input_data);
			$input_data	= 	str_replace($searchArr,"",$input_data);
			$input_data	=	trim($input_data);
			$input_data	= 	strip_tags($input_data);
			return htmlentities(stripslashes($input_data));
	}
	
}

?>