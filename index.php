 <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">    
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<?php
function __autoload($className){
	require_once('classes/'.$className.'.php');
}
$team = new Team;
$getteamdata = $team->GetTeamList();
$rooturl = $team->getrooturl();
?>
<body>
<table align="center" bgcolor="#CCCCCC" border="1px" width="50%">
	<tr>
		<td>Team Number</td>
		<td>Team Name</td>
		<td>Team logo</td>
		<td>View</td>
	</tr>
	<?php
		while ($row = mysql_fetch_array($getteamdata)) {
			$teamID = $team->filterData($row['team_id']);
			$teamName = $team->filterData($row['team_name']);
		?>  
			 <tr>
				<td><?php echo $row['team_id'];?></td>
				<td><?php echo $row['team_name'];?></td>
				<td><img src="<?php echo $rooturl?>/teamlogo/<?php echo $row['team_logo'];?>"  alt="<?php echo $row['team_name'];?>" height="50" width="50" /></td>
				<td><a onclick="GetTeamplayer('<?php echo $teamID;?>','<?php echo $teamName;?>');">View</a></td>
			</tr>
			<tr>
				<td id="teamdetails_<?php echo $teamID;?>" style="display:none;" align="center">
					
				</td>
			</tr>
		<?php }  
		
	
	?>
</table>
</body>
<script type="text/javascript" language="javascript">
function GetTeamplayer(team_id,team_name){
			//alert(team_id);
            $.ajax({
            url: 'ajaxrequest.php',
            data: {team_id:team_id,team_name:team_name},
            method: 'POST',
            dataType: 'html',
            error: function (err) {
            },
            success: function (response) {
			   $("#teamdetails_"+team_id).show();	
               $("#teamdetails_"+team_id).html(response);
            }
            });
        
        
    }
</script>