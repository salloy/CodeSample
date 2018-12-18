<?php 
/*****************
    * Team Table Class File
    * @category   Product File
    * @version    $Id: employee-table.php V1.0 $
    * @author     Shobhit Srivastav(shobhit833@gmail.com). 
	* @createdDate 28th Aug 2017
*****/
require_once('database.php');

Class Teamplayer extends database
{
	protected static $tablename = 'pro_team_player';
	public $dbconnect;
	public function __construct(){
		$dbconnect = parent::connect();
	}
	public function fetchRecordCond($filedName,$filedValue){
		$selectquery = parent::selectwhere($filedName,$filedValue);
		return $selectquery;
	}
	public function InsertRecord($fieldName=NULL,$fieldValues=NULL){
		//echo dbconnect;
		$insertrecors = parent::insert($fieldName,$fieldValues);
	}
	public function filterData($inputData){
		//echo $inputData;
		$filterinputdata = parent::sanitize_data($inputData);
		return $filterinputdata;
	}
	public function getrooturl(){
		$rooturl = parent::rooturl();
		return $rooturl;
	}
	public function Getplayerlist(){
		$getteamlistdata = parent::GetplayerlistData(); 
		return $getteamlistdata;
	} 
	
}
?>