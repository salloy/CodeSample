<?php
function __autoload($className){
	require_once('classes/'.$className.'.php');
}
$teamplayer = new Teamplayer;
$team_id = $_REQUEST['team_id'];
$team_name = $_REQUEST['team_name'];
$getteamplayerdata = $teamplayer->fetchRecordCond('team_id',$team_id);

$teamplayer->GetplayerlistData();
$countdata =  mysql_num_rows($getteamplayerdata);
$rooturl = $teamplayer->getrooturl();
if($countdata > 0){
?>
<table align="center"  border="1px" width="100%">
	<tr>
		<td>ID</td>
		<td>Team Name</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Image</td>
	</tr>
	<?php
		while ($row = mysql_fetch_array($getteamplayerdata)) {
		?>  
			 <tr>
			 	
				<td><?php echo $row['id'];?></td>
				<td><?php echo $team_name;?></td>
				<td><?php echo $row['first_name'];?></td>
				<td><?php echo $row['last_name'];?></td>
				<td><img src="<?php echo $rooturl?>/team/<?php echo 'team'.$team_id;?>/<?php echo $row['id'];?>/<?php echo $row['logo'];?>"  alt="<?php echo $row['first_name'];?>" height="50" width="50" /></td>
			</tr>
			
		<?php }  
		
	
	?>
</table>
<?php
}
else
{
?>
	<table align="center"  border="1px" width="100%">
		<tr>
			<span><?php echo 'No player exist in this team';?></span>
		</tr>
	</table>
<?php
}
