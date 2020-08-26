<?php
require_once 'db_connection.php';

$currencies = [
	[
		'currency_name'  =>  "UAH",
		'is_visible' => true,
	], 

	[
		'currency_name'  =>  "USD",
		'is_visible' => true,
	],

	[
		'currency_name'  =>  "EUR",
		'is_visible' => true,
	],

	[
		'currency_name'  =>  "GBP",
		'is_visible' => false,
	]
	
];
try{
	$sql = 'INSERT INTO currency SET 
		currency_name = :currency_name,
		is_visible = :is_visible			
	';
$pdoStatement = $pdo->prepare($sql);
foreach ($currencies as $currency) {
	$pdoStatement->bindValue(':currency_name' , $currency['currency_name']);	
	$pdoStatement->bindValue(':is_visible' , $currency['is_visible']);	
	$pdoStatement->execute();
}
echo 'Test data added';
die();

}catch(Exception $e){
	echo 'Error adding test data' . $e->getMessage();
}