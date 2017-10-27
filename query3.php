<html>
<head>
  <title> Query 3 </title>
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
  if (isset($_POST['pid'])) {

       $pid=$_POST['pid'];
  };



   $con = mysqli_connect("mysql.cs.mun.ca", "cs4754_mmh623", "passwordHere");
   mysqli_select_db($con, "cs4754_mmh623");
   $sql = "select S.sname, S.address  from Suppliers S, Catalog C where S.sid=C.sid and C.pid= '$pid' and
   C.cost>= (select max(C.cost) from Catalog C where C.pid='$pid')";
   $result = mysqli_query($con, $sql);

   $names = array();
   $addresses = array();

   while($row = $result->fetch_assoc()){
     $names[] = $row['sname'];
     $addresses[] = $row['address'];
   }
   //check if the query returned a result or not
   if($names == null){
     echo "No results found";
   }
   //echo the results of the query
   else{
   for($i=0; $i<count($names) ; $i++){

   echo "Name: $names[$i], \n";
   echo "Address: $addresses[$i]";
   echo "<br>";
   echo "<br>";
   }
  }
 ?>
 </div>
</div>
</body>

</html>
