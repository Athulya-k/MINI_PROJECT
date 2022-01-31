<?php
	include("../dbconnect.php");
	$eid=$_GET["eid"];
?>
<table border="1" >
	<tr style="height:50px"><th colspan="6"><h2>Ballot List of Election ID : <?php echo $eid; ?></h2></th></tr>
	<tr style="height:50px">
		<th>S/No.</th>
		<th>Photo</th>
		<th>ID</th>
		<th>Name</th>
		<th>Party</th>
		<th>Symbol</th>
	</tr>
	<?php
		$sql = "SELECT * FROM tbl_candidate where election_id='".$eid."'";
		//`id`, `uname`, `party`, `dob`, `age`, `gender`, `address`, `mobile`, `password`, `photo`, `timestamp`, `symbol` FROM `tbl_candidate
		$result = $conn->query($sql);
		$c=0;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{	$c++;
			echo"<tr>
			<td>".$c."</td>
			<td><img src='../uploads/".$row["photo"]."' alt='".$row["uname"]."' class='avatar'></td>
			<td>".$row["id"]."</td>
			<td>".$row["uname"]."</td>
			<td>".$row["party"]."</td>
			<td><img src='../uploads/symbol/".$row["symbol"]."' alt='".$row["party"]."' class='avatar'></td>
			</tr>";
			}
		}
		else
		{
			echo"<tr style='height:50px'><td colspan='6'>PLEASE &nbsp; TYPE / SELECT &nbsp; VALID &nbsp;  ELECTION ID</td></tr>";
		}
	?>
</table>
