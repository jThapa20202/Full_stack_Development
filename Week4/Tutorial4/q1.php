<!-- BAsic Output & Conditional Logic -->
 <?php
echo "Name : Jeshika Thapaliya " ,"<br>";
echo "Today's date: " .date("Y-m-d") . "<br>" ;
$CurrentHour = date("H");

if ($CurrentHour < 12){
    echo("Good morning");
}elseif ($CurrentHour < 18){
    echo("Good Afternoon");
}else{
    echo("Good Night");
}
?>