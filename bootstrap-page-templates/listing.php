<?php

include "graphical/header.php";
?>

<div class="span14">
			
	<script src="js/jquery/jquery.tablesorter.min.js"></script>
	<script >
	  $(function() {
	    $("table#sortTableExample").tablesorter({ sortList: [[1,0]] });
	  });
	</script>

	<div class="page-header">
		<h2>Listing</h2>
	</div>

	<table cellpadding="5" cellspacing="5" with="500" align="center" class="zebra-striped">
		<thead>
			<tr>
				<th align="left">Column</th>
				<th align="left">Column</th>
				<th align="left">Column</th>
				<th align="left" width="5%"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left"><a href="detail.php" class="btn small primary">Detail</a></td>
			</tr>	
			<tr>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left"><a href="detail.php" class="btn small primary">Detail</a></td>
			</tr>
			<tr>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left"><a href="detail.php" class="btn small primary">Detail</a></td>
			</tr>
			<tr>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left">Some Value</td>
				<td align="left"><a href="detail.php" class="btn small primary">Detail</a></td>
			</tr>	
		<tbody>
	</table>			
	
  </div>
        
<?php
include "graphical/footer.php";
?>