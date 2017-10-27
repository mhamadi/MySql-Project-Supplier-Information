<html>
<head>
  <title> Query 2 </title>
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
  if (isset($_POST['cost'])) {

       $cost=$_POST['cost'];
  };

   $con = mysqli_connect("mysql.cs.mun.ca", "cs4754_mmh623", "passwordHere");
   mysqli_select_db($con, "cs4754_mmh623");
   $sql = "select DISTINCT S.sname  from Catalog C, Suppliers S where S.sid=C.sid and C.cost >= '$cost' ";
   $result = mysqli_query($con, $sql);

   $names = array();
   while($row = $result->fetch_assoc()){
     $names[] = $row['sname'];
   }
   //check whether there is no input in the text field
   if($cost == null){
     echo "No results found, please enter a number in the text field.";
   }
   //check if the input for cost is a number
   elseif (!is_numeric($cost)) {
     echo "Please enter a number in the text field.";
   }
   //check if the query returned a result or not
   elseif($names == null){
     echo "No results found";
   }
   //echo the results of the query
   else{
   for($i=0; $i<count($names) ; $i++){

   echo "$names[$i] \n";
   echo "<br>";
   echo "<br>";
   }
  }
 ?>
 </div>
</div>
</body>

</html>
