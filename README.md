Что бы запустить данный проект необходимо:
- настроить файл подключения к базе данных "db_connection.php";
- выполнить файлы установки таблиц, и наполнения их данными ("db_install.php" и "seeder_db.php");
- настроить повторно подключение к базе данных в файле "application/core/Model.php"
На главной странице расположено поле ввода значения которое необходимо конвертировать, список валют из которых конвертируется и список валют в котрые конвертируется значение.
Так же есть страница с историей всех выполненных конвертаций, и страница настроек, где можно настроить отображение валют на главной странице.