<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="main.css" />
<title>PrepBuild.com</title>
</head>

<body>
<ul><li><button><a href="signup.php">SIGN UP</a></button></li>
    <li><a href="subs.php">SUBSCRIPTIONS</a></li>
	<li><a href="news.php">NEWS</a></li>
	<li><img src="PICS/LOGO.png" width="120" height="120" align="middle" /></li>
	 <li><a href="Tcon.php">TOP CONTRACTORS</a></li>
	<li><a href="Tarch.php">TOP DESIGNERS</a></li>
	<li><button><a href="signin.php">SIGN IN</a></button></li>
</ul>
<form action="" method="post" name="calculate" dir="ltr" lang="en">
<link rel="stylesheet" type="text/css" href="form.css"/>
<table width="1600" border="0" cellspacing="4" cellpadding="4" >
  <tr>
    <td> <a>VERANDAH TYPE</a></td>
    <td><select name="VC" >
	             <option value="1">PROTRUDE</option>
				 <option value="2">INFLASH</option>
    </select>  </tr>
  <tr>
    <td><a>NUMBER OF ROOMS </a></td>
    <td>
      <input type="text" name="room" />
   </td>
  </tr>   
  <tr>
    <td><a>OVERALL LENGTH</a> </td>
    <td><input name="TL" type="text" /></td>
  </tr>
  <tr>
    <td><a>OVERALL WIDTH</a></td>
    <td><input name="TW" type="text" /></td>
  </tr>
  <tr>
    <td><a>VERANDAH LENGTH</a></td>
    <td><input name="VL" type="text" /></td>
  </tr>
  <tr>
    <td><a>VERANDAH WIDTH<a></td>
    <td><input name="VW" type="text" /></td>
  </tr>
  <tr>
    <td><a>WALL TYPE</a></td>
    <td><select name="wall">
      <option value="1">One brick wall(standard bricks)</option>
      <option value="2">half brick wall(standard bricks)</option>
      <option value="3">half brick wall( blocks)</option>
      <option value="4">timber</option>
    </select></td>
  </tr>
  <tr>
    <td><a>WINDOW TOTAL</a></td>
    <td><input name="win" type="text" /></td>
  </tr>
  <tr>
    <td><a>ROOFING MATERIAL</a></td>
    <td><select name="RM">
	              <option value="1">Asbestos tiles</option>
				  <option value="2">Q Tiles</option>
				  <option value="3">clay tiles</option>
				  <option value="4">Galvanised zinc sheets</option>
				  <option value="5">iron sheets</option>
				  <option value="6">asbestos sheets</option>
		</select></td>
  </tr>
  <tr>
    <td><a>FLOOR</a></td>
    <td><select name="FF">
	           <option value="1">Smoott cement</option>
			   <option value="2">ceramic tile(60x60)</option>
			   <option value="3">creamic tile(30x30)</option>
			   <option value="4">Pocerlin tile(60x60)</option>
			   <option value="5">Porcelin tile(#0x30)</option>
		</select></td>
  </tr>
  <tr>
    <td><a>TYPE OF ROOF</a></td>
    <td><select name="roof">
	                  <option>MONOPITCHED</option>
					  <option>PITCHED</option>
					  <option>HEAPED</option>
					  <option>GABLE</option>
	</select></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="found" value="foundation" />
      <input type="submit" name="wind" value="window level" />
	  <input type="submit" name="roof" value="roofing" />
    </label></td>
    <td><label>
      <input type="submit" name="finish" value="finishes" />
	  <input type="submit" name="fits" value="fittings" />
      <input type="submit" name="overal" value="overall" />
    </label></td>
    </table>
<?php
error_reporting(0);
class Found { var $ol=0;
              var $ow=0;
			  var $vl=0;
			  var $vw=0;
			  var $num=0;
				  public function bricks()
					  {   $mount=new mysqli("localhost","root","","techno");
					       if($mount->connect_error){
					           die("connection failed:".$mount->connect_error);
                           }
					  //calculating bricks
					  $a=($this->ol*900)*4+($this->ow*900)*4+($this->vw*900)*4+($this->vl*900)*2+($this->ol+$this->ow)*($this->num)/2;
					  $bricks=$a/1000000*58;
					  $dc="bricks";
					   //calculating gravel
					   $b=($this->ol*$this->ow*230)+($this->vw*$this->vl*230);
					   $gravel=$b/10000000;
					   $ab="gravel";
					   //calculating the slab
					   $c=(2*$this->ol*690*690)+(2*$this->ow*690*690)+($this->ol*$this->ow*115);
					   $f=($c/1000000000)*0.1;
					   $stone=($c/10000000)*0.3;
					   $cd="stone";
					   $riversand=($c/10000000)*0.6;
					   $de="riversand";
					   //calculating mortar
					   $d=(900/(75+10))*10*$this->ol+(900/(75+10))*10*$this->ow+(($this->ol+$this->ow)/(75+10))*($this->num/2)*10;
					   $pitsand=($d/10000000)*6/7;
					   $e=($d/1000000000)*1/7;
					   $g=$e+$f;
					   $cement=$g/0.035;
					   $ed="PPC Cement PC15 50KG";
					   echo "$ed";

                          $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
                          $mount->query($tem);
                          $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
                          $mount->query($tmol);
                          $net="SELECT Materials.material_name,Materials.m_quantity,halsteds.product_name,halsteds.product_cost,halsted.stock FROM Materials RIGHT JOIN halsteds ON Materials.material_name=halsteds.product_name ORDER BY Materials.haslsteds";
                          $mount->query($net);
                          $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
                          $mount->query($bot);
                          $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION (SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials)";
                          $mount->query($star);
                          $victory='SELECT * FROM Materials ';
                          $mount->query($victory);
                          if ($view=$mount->query($victory))
                          {
                              while($info=$view->fetch_assoc())
                              {
                                  $product=$row["col1"];
                                  $unit=$row["col2"];
                                  $quantity=$row["col3"];
                              }
                              ?>*/?> <table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                  <td>id</td>
                                  <td>product</td>
                                  <td>ammount</td>
                              </tr>
                              <tr>
                                  <td><?php echo"$product";?></td>
                                  <td><?php echo"$unit";?></td>
                                  <td><?php echo "$quantity";?></td>
                              </tr>
        <tr>
            <td></td>
            <td></td>
            <td><</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><</td>
            <td></td>
        </tr>

                          </table>
					   <?php }
                          }}
class Wind extends Found{
         var $walltype=0;
		 var $windownum=0;
		 var $matrix=0;
		 var $width=0;
      public function bricks2()
	    {    //bricks  
		     $a=($this->ol*2300)*$this->matrix+($this->ow*2300)*$this->matrix+($this->vw*2300)*$this->matrix+($this->ol+$this->ow)*($this->num)/2;
					  $bricks=$a/1000000*$this->walltype;
					  $dc="bricks";
			 //agreagates
				$b=($this->ol*230)*$this->width+$this->width*($this->ow*230);
				$f=($b/1000000000)*0.1;
			    $stone=($b/10000000)*0.3;
			    $cd="stone";
			    $de="riversand";
			    $riversand=($b/10000000)*0.6;
			     $d=(2300/($this->hieght+10))*10*$this->ol+(2300/($this->hieght+10))*10*$this->ow+(($this->ol+$this->ow)/(75+10))*($this->num/2)*10;
				 $pitsand=($d/10000000)*6/7;
				 $ed="cement";
		    	 $e=($d/1000000000)*1/7;
		   	     $g=$e+$f;
            $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
            $mount->query($tem);
            $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
            $mount->query($tmol);
            $net="SELECT Materials.material_name,halsteds.product_cost,Material.m_quantity FROM Materials LEFT JOIN halsteds ON Materials.material_name=halsted.product_name ORDER BY Materials.material_name";
            $mount->query($net);
            $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
            $mount->query($bot);
            $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION (SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials)";
            $mount->query($star);
            $victory='SELECT * FROM Materials ';
            $mount->query($victory);
            if ($view=$mount->query($victory))
            {
                while($info=$view->fetch_assoc())
                {
                    $product=$row["col1"];
                    $unit=$row["col2"];
                    $quantity=$row["col3"];
                    $amount=$row["col4"];
                }
                ?> <table border="0" cellspacing="2" cellpadding="2">
                <tr>
                    <td>product</td>
                    <td>unit price</td>
                    <td>quantity</td>
                    <td>ammount</td>
                </tr>
                <tr>
                    <td><?php echo"$product";?></td>
                    <td><?php echo"$unit";?></td>
                    <td><?php echo "$quantity";?></td>
                    <td><?php echo "$amount";?></td>
                </tr>
            </table>
			 <?php }}
     public function bricks3()
	         {
					  $a=($this->ol*900)*4+($this->ow*900)*4+($this->vw*900)*4+($this->vl*900)*2+($this->ol+$this->ow)*($this->num)/2;
					  $bricks1=$a/1000000*58;
					   
					   //calculating gravel
					   $b=($this->ol*$this->ow*230)+($this->vw*$this->vl*230);
					   $gravel=$b/10000000;
					   echo"$gravel<br>";
					   //calculating the slab
					   $c=(2*$this->ol*690*690)+(2*$this->ow*690*690)+($this->ol*$this->ow*115);
					   $f=($c/1000000000)*0.1;
					   $stone=($c/10000000)*0.3;
					   $riversand=($c/10000000)*0.6;
					   echo"$stone<br>";
					   echo"$riversand<br>";
					   //calculating mortar
					   $d=(900/(75+10))*10*$this->ol+(900/(75+10))*10*$this->ow+(($this->ol+$this->ow)/(75+10))*($this->num/2)*10;
					   $pitsand2=($d/10000000)*6/7;
					   $e=($d/1000000000)*1/7;
					   $g=$e+$f;
					   $cement1=$g/0.035;
					   
					     //bricks  
		     $h=($this->ol*2300)*$this->matrix+($this->ow*2300)*$this->matrix+($this->vw*2300)*$this->matrix+($this->ol+$this->ow)*($this->num)/2;
					  $bricks2=$h/1000000*$this->walltype;
					   $bricks=$bricks1+$bricks2;
					   echo"$bricks";
			 //agreagates
				$i=($this->ol*2300)*$this->width+$this->width*($this->ow*2300);
				$j=($i/1000000000)*0.1;
			    $stone=($j/10000000)*0.3;
			    $riversand=($j/10000000)*0.6;
			    echo"$stone<br>";
			    echo"$riversand<br>";
			     $k=(2300/($this->hieght+10))*10*$this->ol+(2300/($this->hieght+10))*10*$this->ow+(($this->ol+$this->ow)/(75+10))*($this->num/2)*10;
				 $pitsand1=($k/10000000)*6/7;
		    	 $l=($k/1000000000)*1/7;
		   	     $m=$j+$k;
				 $cement2=$m/0.035;
				 $pitsand=$pitsand1+$pitsand2;
				 $cement=$cement1+$cement2;
				 echo"$pitsand<br>";
				 echo"$cement<br>";
                 $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
                 $mount->query($tem);
                 $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
                 $mount->query($tmol);
                 $net="SELECT Materials.material_name,Materials.m_quantity,halsteds.product_name,halsteds.product_cost,halsted.stock FROM Materials RIGHT JOIN halsteds ON Materials.material_name=halsteds.product_name ORDER BY Materials.haslsteds";
                 $mount->query($net);
                 $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
                 $mount->query($bot);
                 $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION (SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials)";
                 $mount->query($star);
                 $victory='SELECT * FROM Materials ';
                 $mount->query($victory);
                 if ($view=$mount->query($victory))
                 {
                     while($info=$view->fetch_assoc())
                     {
                         $product=$row["col1"];
                         $unit=$row["col2"];
                         $quantity=$row["col3"];
                         $amount=$row["col4"];
                     }
                     ?> <table border="0" cellspacing="2" cellpadding="2">
                     <tr>
                         <td>product</td>
                         <td>unit price</td>
                         <td>quantity</td>
                         <td>ammount</td>
                     </tr>
                     <tr>
                         <td><?php echo"$product";?></td>
                         <td><?php echo"$unit";?></td>
                         <td><?php echo "$quantity";?></td>
                         <td><?php echo "$amount";?></td>
                     </tr>
                 </table>
				 <?php }}
	public function timber(){
	             //wood needed
				 $wood=(($this->ol/1000+$this->ow/1000));
				 $wood1=(($this->ol+$this->ow)*$this->num/4)/1000;
				 $wood3=$this->ol/6000+$this->ow/6000;
				 $wood4=(($this->ol+$this->ow)*$this->num/4)/4800;
				 $wd=$wood+$wood3;
				 $ws="228x38 S5 R/S 6M timber";
				 $wds=$wood1+$wood4;
				 $we="114x38 S5 R/S 4.8M timber";
				 $isover_polterm_max_plus=($this->ol*$this->ol)/(12000*600);
				 $d="isover_polterm_max_plus";
        $isover_timber_frame_roll32=(($this->ol*$this->ow)*($this->num)/2)/(1140*4200);
                 $e="isover_timber_frame_roll32";
        $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
        $mount->query($tem);
        $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
        $mount->query($tmol);
        $net="SELECT Materials.material_name,halsteds.product_cost,Materials.m_quantity FROM Materials LEFT JOIN halsteds ON Materials.material_name=halsted.product_name ORDER BY Materials.material_name";
        $mount->query($net);
        $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
        $mount->query($bot);
        $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION (SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials)";
        $mount->query($star);
        $victory='SELECT * FROM Materials ';
        $mount->query($victory);
        if ($view=$mount->query($victory))
        {
            while($info=$view->fetch_assoc())
            {
                $product=$row["col1"];
                $unit=$row["col2"];
                $quantity=$row["col3"];
                $amount=$row["col4"];
            }
            ?> <table border="0" cellspacing="2" cellpadding="2">
            <tr>
                <td>product</td>
                <td>unit price</td>
                <td>quantity</td>
                <td>ammount</td>
            </tr>
            <tr>
                <td><?php echo"$product";?></td>
                <td><?php echo"$unit";?></td>
                <td><?php echo "$quantity";?></td>
                <td><?php echo "$amount";?></td>
            </tr>
        </table><?php}}}
				 
class Roof extends Found
{
    var $type = 0;
    var $rtype=0;
     public function roof()
     {
         $rise=($this->ow/2)*tan( 40.);
         $run=$this->ow/2;
         $slope=40;
         $c=hypot($run,$rise);
         $wood=(($this->ol+$this->ow))/6000;
         $wood2=(($this->ow+(2*$c)+(4*$rise)+($rise*5))*$this->ol/1000)/6000;
         $tim=$wood+$wood2;
         $ca="114x38 4.8M timber";
         $brand=(($this->ol/600)*($this->ow/500))*2;
         $f="38x38 60M brandering";
         $ceiling=($this->ol*$this->ow)/(200*6000);
         $j="200x600 ceiling boards";
         $tiles=($this->ol*$c*2)/(400*600);
         $k="400x600 roofing tiles";
         $Qtiles=($this->ol*$c*2)/(1000*6000);
         $r="Q tiles";
         $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
         $mount->query($tem);
         $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
         $mount->query($tmol);
         $net="SELECT Materials.material_name,halsteds.product_cost,Materials.m_quantity FROM Materials LEFT JOIN halsteds ON Materials.material_name=halsted.product_name ORDER BY Materials.material_name";
         $mount->query($net);
         $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
         $mount->query($bot);
         $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION (SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials)";
         $mount->query($star);
         $victory='SELECT * FROM Materials ';
         $mount->query($victory);
         if ($view=$mount->query($victory))
         {
             while($info=$view->fetch_assoc())
             {
                 $product=$row["col1"];
                 $unit=$row["col2"];
                 $quantity=$row["col3"];
                 $amount=$row["col4"];
             }
             ?> <table border="0" cellspacing="2" cellpadding="2">
             <tr>
                 <td>product</td>
                 <td>unit price</td>
                 <td>quantity</td>
                 <td>ammount</td>
             </tr>
             <tr>
                 <td><?php echo"$product";?></td>
                 <td><?php echo"$unit";?></td>
                 <td><?php echo "$quantity";?></td>
                 <td><?php echo "$amount";?></td>
             </tr>
         </table><?php}
     }

}
class Finishes extends Found
{
    var $choice=0;
    var $wchoice=0;

    public function finishes()
    {
        $cement=((($this->ow*$this->ol)+($this->vl*$this->vw))*10)/0.035;
        $bt=(($this->ow*$this->ol)+($this->vl*$this->vw))/(60*60);
        $t="60x60 tiles";
        $st=(($this->ow*$this->ol)+($this->vl*$this->vw))/(30*60);
        $n="30x30 tiles";
        $bert=((4*$this->ol*3200*10)+(4*$this->ow*3200*10)+((($this->ow*3200)+($this->ol*3200))*4/8))*2/3;
        $b="riversand";
        $cement1=((4*$this->ol*3200*10)+(4*$this->ow*3200*10)+((($this->ow*3200)+($this->ol*3200))*4/8))*1/3*0.035;
        $ref=$cement+$cement1;
        $m="cement";
        $wall=(($this->ow*3200)+($this->ol*3200))/8;
        $t="wall tile";
        $vents=$this->num*2;
        $x="vents";
        $Crails=$this->num;
        $v="curtain rails";
        $sockets=$this->num+3;
        $q="sockets";
        $switch=$this->num+3;
        $l="switch";
        $lamps=$this->num+4;
        $o="lamp";
        $tem="CREATE TABLE Materials(material_id INT(6) NOT NULL AUTO_INCREMENT, material_name VARCHAR(80), m_quantity INT(15),PRIMARY KEY (material_id))";
        $mount->query($tem);
        $tmol="INSERT INTO Materials(material_name,m_quantity) VALUES ('$dc','$bricks'),('$cd','$stone'),('$de','$riversand'),('$ed','$cement')";
        $mount->query($tmol);
        $net="SELECT Materials.material_name,halsteds.product_cost,Materials.m_quantity FROM Materials LEFT JOIN halsteds ON Materials.material_name=halsted.product_name ORDER BY Material.material_name";
        $mount->query($net);
        $bot="SELECT product_cost,m_quantity,(product_cost*m_quantity) AS ammount FROM Materials";
        $mount->query($bot);
        $star="SELECT material_name,product_cost,m_quantity,ammount FROM Materials UNION SELECT 'TOTAL'AS material_name,sum(ammount) ammount FROM Materials";
        $mount->query($star);
        $victory='SELECT * FROM Materials ';
        if ($view=$mount->query($victory))
        {
            while($info=$view->fetch_assoc())
            {
                $product=$row["col1"];
                $unit=$row["col2"];
                $quantity=$row["col3"];
                $amount=$row["col4"];
            }
            ?> <table border="0" cellspacing="2" cellpadding="2">
                       <tr>
                           <td>product</td>
                           <td>unit price</td>
                           <td>quantity</td>
                           <td>ammount</td>
                       </tr>
                       <tr>
                           <td><?php echo"$product";?></td>
                           <td><?php echo"$unit";?></td>
                           <td><?php echo "$quantity";?></td>
                           <td><?php echo "$amount";?></td>
                       </tr>
    </table>
<?php        }
    }
}
   if (isset($_POST['found']))
   {
       if ($_POST['VC']==1)
         { 
		  $home= new Found();
		  $home->ol=$_POST['TL'];
		  $home->ow=$_POST['TW'];
		  $home->vl=$_POST['VL'];
		  $home->vw=$_POST['VW'];
		  $home->num=$_POST['room'];
		  $home->bricks();}
	else
	    {$home= new Found();
		  $home->ol=$_POST['TL'];
		  $home->ow=$_POST['TW'];
		  $home->vl=0;
		  $home->vw=0;
		  $home->num=$_POST['room'];
		  $home->bricks();} }
	if(isset($_POST['wind']))
	   { if($_POST['wall']==1)
	      {$home=new Wind;
		   $home->ol=$_POST['TL'];
		   $home->ow=$_POST['TW'];
		  $home->vl=$_POST['VL'];
		  $home->vw=$_POST['VW'];
		  $home->num=$_POST['room'];
		  $home->walltype=58;
		  $home->matrix=4;
		  $home->width=230;
		  $home->bricks2();}
		  else if($_POST['wall']==2)
		  { $home=new Wind;
		   $home->ol=$_POST['TL'];
		   $home->ow=$_POST['TW'];
		  $home->vl=$_POST['VL'];
		  $home->vw=$_POST['VW'];
		  $home->num=$_POST['room'];
		  $home->walltype=58;
		  $home->matrix=2;
		  $home->width=115;
		  $home->bricks2();}
		  else if($_POST['wall']==3)
		  {$home=new Wind;
		   $home->ol=$_POST['TL'];
		   $home->ow=$_POST['TW'];
		  $home->vl=$_POST['VL'];
		  $home->vw=$_POST['VW'];
		  $home->num=$_POST['room'];
		  $home->walltype=11;
		  $home->matrix=2;
		  $home->width=115;
		  $home->bricks2();}
		  else if($_POST['wall']==4)
		  {$home=new Wind;
		   $home->ol=$_POST['TL'];
		   $home->ow=$_POST['TW'];
		  $home->vl=$_POST['VL'];
		  $home->vw=$_POST['VW'];
		  $home->num=$_POST['room'];
		  $home->timber();}
		  }
	if(isset($_POST['roof']))
    {$home=new Roof;
        $home->ol=$_POST['TL'];
        $home->ow=$_POST['TW'];
        $home->vl=$_POST['VL'];
        $home->vw=$_POST['VW'];
        $home->num=$_POST['room'];
        $home->rtype=$_POST['roof'];
        $home->type=$_POST['RM'];
        $home->roof();
    }
	if(isset($_POST['finish']))
    {
        $home=new Finishes;
        $home->ol=$_POST['TL'];
        $home->ow=$_POST['TW'];
        $home->vl=$_POST['VL'];
        $home->vw=$_POST['VW'];
        $home->num=$_POST['room'];
        $home->finishes();
    }
	   
 ?>
<br />
<br />
<div>N.B: FOR ALL DETAILS THAT ARE NOT VISIBLE ON THE PLAN, CALCULATIONS WILL BE DONE AFTER QUALITY DESCRITION IS SENT TO 0779936122</div>
</form>
</body>
</html>
