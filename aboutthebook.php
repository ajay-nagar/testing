<?php
include "variables.php";
include "includes/mysql_connect.php";
mysql_query("SET NAMES 'utf8'");
?>
<table width="100%"  border="0">
  <tr>
    <td align="center"><font size="4" color="#618919"> About The Book test </font>
                          <hr color=#ffffff noshed></td>
  </tr>
<?php
//echo $isbn;
$str="select * from BookDetails where isbn='$isbn'";
$sql= mysql_query($str);
$chklogin=mysql_num_rows($sql);
while($row = mysql_fetch_array($sql))
{ 
if (trim($row['synopsis'])!=""){
?>
  <tr><td align="left"><strong>Description:<br></strong></td></tr>
  <tr>
    <td  class='normal' align="left"><p align="justify"><?php echo $row['synopsis'] ?></p></td>
	  <tr><td align="left"><strong><br>Contents:<br></strong></td></tr>
	  	  <tr><td align="left"><?php echo nl2br($row['contents']); ?></td></tr>
          <tr><td align="left">&nbsp;</td></tr>
	  	  
           <? if($row['manual']=='Yes')
		  {
				  if ($isbn=='978-81-203-4007-7')
				  {	
				  ?>
				   <tr><td align="left"><strong>Solution Manual is available directly from MIT Press. Please register on their website to request the manual.</strong></td></tr>
				  <?
				  }
				  else
				  {
					  ?>
					   <tr><td align="left"><a href="../sm_copy_op.php?isbn=<? echo $row['isbn']; ?>" target="_blank"><strong>Solution Manual is available for adopting faculty. Click here to request...</strong></a></td></tr>
					  <?
				  }
		   }
		  else
		  { //Nothing
		  }?>
<?php
}
else
{
echo "<tr ><td align='center' class='normal'>Sorry, Internal Error Occured</td></tr>"; 
}
}
?>
</tr>
</table>