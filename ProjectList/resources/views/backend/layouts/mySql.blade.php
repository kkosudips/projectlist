  
<hr>
<?php 
    #connect
    $host = "localhost";
    $user = "root";
    $password ="";
    $database = "projectlist";
    $connect = new mysqli($host,$user,$password,$database);
    if($connect->connect_error){
        die("連線失敗".$connect->connect_error);   
    }
    $connect ->query("SET NAMES 'utf8'");
    
    #insert
    if(isset($_POST['userText'])){
        $selectSql = "SELECT * FROM todolist ";
        $textData = $connect->query($selectSql);
        $userText = $_POST['userText'];
        $insertSql = "INSERT INTO  todolist(text) VALUES('$userText')";
        $status=$connect->query($insertSql);
        if(!$status){
            echo "錯誤: " . $insertSql . "<br>" . $connect->error;
        }
    }

    #delete single text
    if(isset($_POST['delId'])){
        $delId = $_POST['delId'];
        $deleteSql = "DELETE FROM todolist WHERE id = $delId ";
        $status = $connect->query($deleteSql);
        if (!$status) {
            echo "錯誤: " . $deleteSql . "<br>" . $connect->error;
        } 
    }
    
    #truncate
    if(isset($_POST['submit'])){
        $truncate = 'TRUNCATE TABLE todolist';
        $status=$connect->query($truncate);
        if (!$status) {
            echo "錯誤: " . $truncate . "<br>" . $connect->error;
        } 
    }

    #show data
    $selectSql = "SELECT * FROM todolist ";
    $textData = $connect->query($selectSql);
    if ($textData->num_rows > 0) {
        $number = 0;
        while ($row = $textData->fetch_assoc()) {
            echo $row['id'];
            echo ": ";
            echo $row['text'];
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
            if(++$number==5){
                echo "<br>";
                $number=0;
            }
            
        }
    } else {
        echo '0筆資料';
    }
?>

