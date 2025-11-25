<?php

// latihan is_array()
$fruit = ["apple", "banana", "mango"];
if(is_array($fruit)){
    echo "Yes, it is an array";
}else{
    echo "No, it is not an array";
}

echo "<br><br>";

$params = "apple";
if(in_array($params, $fruit)){
    echo "Yes, ".$params." is in the array";
}else{
    echo "No, ".$params." it is not an array";
}

echo "<br><br>";

// latihan in_array()
$params = "king fruit";
if(in_array($params, $fruit)){
    echo "Yes, ".$params." apple is in the array";
}else{
    echo "No, ".$params." apple is not in the array";
}

echo "<br><br>";
// list
list($fruit1, $fruit2, $fruit3) = $fruit;
echo "Fruit 1: ".$fruit1."<br>";
echo "Fruit 2: ".$fruit2."<br>";
echo "Fruit 3: ".$fruit3."<br>";

echo "<br><br>";

$data =['1', '2', '3', '4', '5'];
list($a, $b, $c, $d, $e) = $data;
$count = $b + $e;
echo "Sum of $a and $c is $count";

echo "<br><br>";
// split() or explode()
$string = "Nissan,Honda,Toyota,Ford,BMW";
$cars = explode(",", $string);
print_r($cars);

echo "<br><br>";
// join() or implode()
$array1 = ["Horse", "Cow", "Sheep", "Goat"];
$array2 = ["Cat", "Chicken", "Fish", "Duck"];

$result = implode(" - ", $array1);
echo $result;

echo "<br><br>";
// merge()
$result_merge = array_merge($array1, $array2);
print_r($result_merge);

echo "<br><br>";
// array_pop()
$fruits = ["apple", "banana", "mango"];
array_pop($fruits);
echo "Last fruit: ".$fruits[count($fruits)-1];

echo "<br><br>";
//array_push()
$fruits = ["apple", "banana", "mango"];
array_push($fruits, "orange");
print_r($fruits);

echo "<br><br>";
//array_unshift()
$fruits = ["apple", "banana", "mango"];
array_unshift($fruits, "orange");
print_r($fruits);

echo "<br><br>";
//array_shift()
$fruits = ["apple", "banana", "mango"];
array_shift($fruits);
echo "First fruit: ".$fruits[0];

echo "<br><br>";