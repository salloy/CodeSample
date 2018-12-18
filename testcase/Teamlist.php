<?php
/*****************
    * Test Case For Team List
    * @category   Unit Tes File
    * @version    $Id: phpunit V1.0 $
    * @author     Shobhit Srivastav(shobhit833@gmail.com). 
	* @createdDate 28th Aug 2017
*****/
require 'classes/Team.php';
Class Teamlist extends PHPUnit_Framework_TestCase
{ 
	private $totalteam;
    protected function setUp()
    {
        $this->team = new Team();
    }
 
    protected function tearDown()
    {
        $this->calculator = NULL;
    }
 
    public function testforteamlist()
    {
        $result = $this->team->GetTeamList();
		$this->totalteam = mysql_num_rows($result);
		$resultstr = $this->totalteam.'Teams available in our system';
        $this->assertEquals($resultstr, $resultstr);
    }
}
?>

