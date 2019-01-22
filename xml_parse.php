<?php
require_once __DIR__."/connection.php";
//require_once __DIR__."/erp_sql.php";
    
class Table_Create{


    function create_table(){

        try
        {
            //connection creation
            $database = new Connection();
            $db = $database->getConnection();
            //connection establish
            // sql to create table
            $xml=simplexml_load_file("schema.xml") or die("Error: Cannot create object");
            $table_name=$xml->table[0]['name'];
            $id = $xml->table[0]->column[0]['name'];
            $name = $xml->table[0]->column[1]['name'];
            $email = $xml->table[0]->column[2]['name'];
            $password = $xml->table[0]->column[3]['name'];
          /*  echo "hello";
            echo "<br>";
            echo $id;
            echo "<br>";
            echo $table_name;
            echo "<br>";
            echo $name;
            echo "<br>";
            
            echo $email;
            echo "<br>";
            echo $password;
            echo "<br>";
            */
            $sql = "CREATE TABLE $table_name (
                $id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                $name VARCHAR(30) NOT NULL,
                $email VARCHAR(50),
                $password VARCHAR(40),
                UNIQUE ($email)
                )";
              
              $db->exec($sql);

              echo "Table MyGuests created successfully";
  
              $database->closeConnection();
            
        
        }
        catch (PDOException $e)
        
        {
        
            echo "There is some problem in connection: " . $e->getMessage();
        
        }
     }

    
}
?>