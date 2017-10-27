<html>
<head>
  <title> Query 5 </title>
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
  if (isset($_POST['address'])) {

       $address=$_POST['address'];
  };

   $con = mysqli_connect("mysql.cs.mun.ca", "cs4754_mmh623", "passwordHere");
   mysqli_select_db($con, "cs4754_mmh623");
   $sql = "select distinct S.sid, S.sname  from Suppliers S
   where S.address = '$address' and not exists( Select C.sid
   from Catalog C, Suppliers S
   where S.sid=C.sid and S.address='$address' )";
   $result = mysqli_query($con, $sql);

   $sids = array();
   $names = array();
   while($row = $result->fetch_assoc()){
     $sids[] = $row['sid'];
     $names[]=$row['sname'];

   }
   //check if the query returned a result or not
   if($sids == null){
     echo "No results found";
   }
   //echo the results of the query
   else{
   for($i=0; $i<count($sids) ; $i++){

   echo "Supplier ID: $sids[$i], \n";
   echo "Supplier Name: $names[$i]";
   echo "<br>";
   echo "<br>";
   }
  }
 ?>
</div>
</div>
</body>

</html>
