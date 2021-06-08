<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="main.css" />
<title>Untitled Document</title>
</head>

<body>
<ul>
    <li><img src="PICS/LOGO.png" width="120" height="120" align="middle" alt="" /></li>
</ul>	 
	 <form action="" method="post"  name="A&D" dir="ltr" lang="en">
	 <link rel="stylesheet" type="text/css" href="form.css"/>
<ul>
	 <li><input type="submit" value="view" name="view"/></li>
	 <li><input type="submit" value="add supplier" name="add_supplier"/></li>
	 <li><input type="submit" value="Add material" name="Add_material"/><br /></li>
</ul>	 
	 <?php
	 if(isset($_POST['Add_material']))
	    {?> <table width="1600" border="0" cellspacing="4" cellpadding="4" >
		       <tr>
			      <td>Prouct QR</td>
				  <td>Product Name</td>
				  <td>Product Cost(Zwl)</td>
				  <td>stock</td>
				 </tr>
						 <tr>
			     <td><input name="1qr" type="text" /></td>
				 <td><input name="1nm" type="text" /></td>
				 <td><input name="1cst" type="text" /></td>
				 <td><input name="1st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="2qr" type="text" /></td>
				 <td><input name="2nm" type="text" /></td>
				 <td><input name="2cst" type="text" /></td>
				 <td><input name="2st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="3qr" type="text" /></td>
				 <td><input name="3nm" type="text" /></td>
				 <td><input name="3cst" type="text" /></td>
				 <td><input name="3st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="4qr" type="text" /></td>
				 <td><input name="4nm" type="text" /></td>
				 <td><input name="4cst" type="text" /></td>
				 <td><input name="4st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="5qr" type="text" /></td>
				 <td><input name="5nm" type="text" /></td>
				 <td><input name="5cst" type="text" /></td>
				 <td><input name="5st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="6qr" type="text" /></td>
				 <td><input name="6nm" type="text" /></td>
				 <td><input name="6cst" type="text" /></td>
				 <td><input name="6st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="7qr" type="text" /></td>
				 <td><input name="7nm" type="text" /></td>
				 <td><input name="7cst" type="text" /></td>
				 <td><input name="7st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="8qr" type="text" /></td>
				 <td><input name="8nm" type="text" /></td>
				 <td><input name="8cst" type="text" /></td>
				 <td><input name="8st" type="text" /></td>
			</tr>
						 <tr>
			     <td><input name="9qr" type="text" /></td>
				 <td><input name="9nm" type="text" /></td>
				 <td><input name="9cst" type="text" /></td>
				 <td><input name="9st" type="text" /></td>
			</tr>			 <tr>
			     <td><input name="10qr" type="text" /></td>
				 <td><input name="10nm" type="text" /></td>
				 <td><input name="10cst" type="text" /></td>
				 <td><input name="10st" type="text" /></td>
            </tr>
			     <td><input type="submit" value="save" name="save"/></td>
				 <td><input type="submit" value="add supplier" name="add_supplier"/></td>
			</tr></table>
			<?php }
			if(isset($_POST['add_supplier']))
			{
			   ?><table width="1600" border="0" cellspacing="4" cellpadding="4" >
			       <tr>
				       <td><a>Name</a></td>
					   <td><input name="name" type="text"/></td>
				  </tr>
				  			       <tr>
				       <td><a>Town</a></td>
					   <td><input name="town" type="text"/></td>
				  </tr>
				  			       <tr>
				       <td><a>Province</a></td>
					   <td><input name="province" type="text"/></td>
				  </tr>
				  <tr>
				      <td><input name="submit" type="submit" value="submit"/></td>
				</tr>
				</table>
			<?php }
			error_reporting();
			if(isset($_POST['submit']))
			{ $dbname=$_POST['name'];
			  $town=$_POST['town'];
			  $province=$_POST['province'];
			  $king =mysqli_connect("localhost","root","","techno");
			  $dee="CREATE TABLE suppliers(supplier_id INT(6) NOT NULL AUTO_INCREMENT, supplier_name VARCHAR(50), supplier_town VARCHAR(50), supplier_province VARCHAR(50), PRIMARY KEY(supplier_id))";
			 mysqli_query($king,$dee);
			 $add="INSERT INTO suppliers(supplier_name,supplier_town,supplier_province) VALUES ('$dbname','$town','$province')";
			 mysqli_query($king,$add);
			 $fix='SELECT supplier_name FROM suppliers';
			 $take=mysqli_query($king,$fix);
			 while($check=mysqli_fetch_assoc($take))
			  { if($dbname==$check)
			     {
                     if (isset($dbname)) {
                         $a="CREATE TABLE $dbname (product_id INT(6) NOT NULL AUTO_INCREMENT, product_qr INT(20), product_name VARCHAR(50), product_price INT(10), stock INT(5), PRIMARY KEY(product_id))";
                     }
                 }
			  }
			  }
			  if(isset($_POST['save']))
			  { $start=mysqli_connect("localhost","root","","techno");
			    $qr=$_POST['1qr'];
			    $nm=$_POST['1nm'];
			    $cst=$_POST['1cst'];
			    $st=$_POST['1st'];
                  $qr2=$_POST['2qr'];
                  $nm2=$_POST['2nm'];
                  $cst2=$_POST['2cst'];
                  $st2=$_POST['2st'];
                  $qr3=$_POST['3qr'];
                  $nm3=$_POST['3nm'];
                  $cst3=$_POST['3cst'];
                  $st3=$_POST['3st'];
                  $qr4=$_POST['4qr'];
                  $nm4=$_POST['4nm'];
                  $cst4=$_POST['4cst'];
                  $st4=$_POST['4st'];
                  $qr5=$_POST['5qr'];
                  $nm5=$_POST['5nm'];
                  $cst5=$_POST['5cst'];
                  $st5=$_POST['5st'];
                  $qr6=$_POST['6qr'];
                  $nm6=$_POST['6nm'];
                  $cst6=$_POST['6cst'];
                  $st6=$_POST['6st'];
                  $qr7=$_POST['7qr'];
                  $nm7=$_POST['7nm'];
                  $cst7=$_POST['7cst'];
                  $st7=$_POST['7st'];
                  $qr8=$_POST['8qr'];
                  $nm8=$_POST['8nm'];
                  $cst8=$_POST['8cst'];
                  $st8=$_POST['8st'];
                  $qr9=$_POST['9qr'];
                  $nm9=$_POST['9nm'];
                  $cst9=$_POST['9cst'];
                  $st9=$_POST['9st'];
                  $qr10=$_POST['10qr'];
                  $nm10=$_POST['10nm'];
                  $cst10=$_POST['10cst'];
                  $st10=$_POST['10st'];
                  $get="INSERT INTO halsteds(product_qr,product_name,product_cost,stock) VALUES ('$qr','$nm','$cst','$st'),('$qr2','$nm2','$cst2','$st2'),('$qr3','$nm3','$cst3','$st3'),('$qr4','$nm4','$cst4','$st4'),('$qr5','$nm5','$cst5','$st5'),('$qr6','$nm6','$cst6','$st6'),('$qr7','$nm7','$cst7','$st7'),('$qr8','$nm8','$cst8','$st8'),('$qr9','$nm9','$cst9','$st9'),('$qr10','$nm10','$cst10','$st10')";
                  mysqli_query($start,$get);
                  mysqli_real_escape_string($qr);
                  mysqli_real_escape_string($nm);
                  mysqli_real_escape_string($cst);
                  mysqli_real_escape_string($st);
                  mysqli_real_escape_string($qr2);
                  mysqli_real_escape_string($nm2);
                  mysqli_real_escape_string($cst2);
                  mysqli_real_escape_string($st2);
                  mysqli_real_escape_string($qr3);
                  mysqli_real_escape_string($nm3);
                  mysqli_real_escape_string($cst3);
                  mysqli_real_escape_string($st3);
                  mysqli_real_escape_string($qr4);
                  mysqli_real_escape_string($nm4);
                  mysqli_real_escape_string($cst4);
                  mysqli_real_escape_string($st4);
                  mysqli_real_escape_string($qr5);
                  mysqli_real_escape_string($nm5);
                  mysqli_real_escape_string($cst5);
                  mysqli_real_escape_string($st5);
                  mysqli_real_escape_string($qr6);
                  mysqli_real_escape_string($nm6);
                  mysqli_real_escape_string($cst6);
                  mysqli_real_escape_string($st6);
                  mysqli_real_escape_string($qr7);
                  mysqli_real_escape_string($nm7);
                  mysqli_real_escape_string($cst7);
                  mysqli_real_escape_string($st7);
                  mysqli_real_escape_string($qr8);
                  mysqli_real_escape_string($nm8);
                  mysqli_real_escape_string($cst8);
                  mysqli_real_escape_string($st8);
                  mysqli_real_escape_string($qr9);
                  mysqli_real_escape_string($nm9);
                  mysqli_real_escape_string($cst9);
                  mysqli_real_escape_string($st9);
                  mysqli_real_escape_string($qr10);
                  mysqli_real_escape_string($nm10);
                  mysqli_real_escape_string($cst10);
                  mysqli_real_escape_string($st10);
			   }
			 ?>
			
</form>	
</body>
</html>
