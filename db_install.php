<meta charset="utf-8">
<?php
require_once 'db_connection.php';
try{
	$sql = 'CREATE TABLE history(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		value INT(11) NOT NULL,
		from_currency VARCHAR(255) NOT NULL,
		to_currency VARCHAR(255) NOT NULL,
		final_amount FLOAT(25) NOT NULL
	)DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
	$pdo->exec($sql);

	$sql = 'CREATE TABLE currency (
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     currency_name VARCHAR(30) NOT NULL,
     is_visible BOOLEAN DEFAULT FALSE      
    )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB ';
    $pdo->exec($sql);

}catch(Exception $e){
	echo "Не удалось создать таблицу" . $e->getMessage();
}