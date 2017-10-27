<html>
<head>
  <title> Query 1 </title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <a href="index.html" id="title">
      <h1> MySql Project </h1>
      <h2> Done by Moe(Mohamad) Hamadi </h2>
    </a>
  </header>
  <div id="outer">
    <div id="inner">
        <h2> Answer: </h2>
  <?php
  if (isset($_POST['partName'])) {

       $partName=$_POST['partName'];
  };

   $con = mysqli_connect("mysql.cs.mun.ca", "cs4754_mmh623", "passwordHere");
   mysqli_select_db($con, "cs4754_mmh623");
   $sql = "select C.sid, S.sname, S.address, C.cost  from Parts P, Catalog C, Suppliers S
   where P.pid=C.pid and C.sid=S.sid and
   P.pname= '$partName' ";
   $result = mysqli_query($con, $sql);

   $sid = array();
   $sname = array();
   $address= array();
   $cost = array();
   while($row = $result->fetch_assoc()){
     $sid[] = $row['sid'];
     $sname[] = $row['sname'];
     $address[] = $row['address'];
     $cost[] = $row['cost'];
   }

  //check if the query returned a result or not
   if($sid == null){
     echo "No results found";
   }
  //echo the results of the query
   else{
   for($i=0; $i<count($sid) ; $i++){
    $j = $i+1;
   if(isset($_POST['supplierInfo1'])  ){
   echo "Supplier $j ID: $sid[$i] \n";
   echo "<br>";
   }

   if(isset($_POST['supplierInfo2'])  ){
   echo "Supplier $j Name: $sname[$i] \n";
   echo "<br>";
   }

   if(isset($_POST['supplierInfo3'])  ){
   echo "Supplier $j Address: $address[$i] \n";
   echo "<br>";
   }

   if(isset($_POST['supplierInfo4'])  ){
   echo "Cost $j Charged: $cost[$i] dollars\n";
   echo "<br>";
   }
   echo "<br>";
   echo "<br>";
 }
}
 ?>
 </div>
</div>

</body>

</html>
