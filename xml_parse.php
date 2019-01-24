<?php
require_once __DIR__."/Config/connection.php";
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
            $table_name1=$xml->table[0]['name'];
            $table_name=$xml->table[0];
            //$column0=$xml->table[0]->column[0];

            // $us=array("name"=>$column[$i]['name'],"type"=>$column[$i]['type'],"required"=>$column[$i]['required']);
           // echo "type".$column[0]->attributes()->{'type'};
  
              
             //echo $column[0]['name']['type']['required'];
                $i=0;
                $j=1;
                $k=2;
                $l=3;
                /* method 1 */
                /*
                $user=array(

                    array("name"=>$table_name->column[$i]->attributes()->{'name'}, "type"=>$table_name->column[$i]->attributes()->{'type'},"size"=>$table_name->column[$i]->attributes()->{'size'},"primaryKey"=>$table_name->column[$i]->attributes()->{'primaryKey'},"autoIncrement"=>$table_name->column[$i]->attributes()->{'autoIncrement'}, "required"=>$table_name->column[$i]->attributes()->{'required'}),
                    array("name"=>$table_name->column[$j]->attributes()->{'name'}, "type"=>$table_name->column[$j]->attributes()->{'type'},"size"=>$table_name->column[$j]->attributes()->{'size'},"required"=>$table_name->column[$j]->attributes()->{'required'}),
                    array("name"=>$table_name->column[$k]->attributes()->{'name'}, "type"=>$table_name->column[$k]->attributes()->{'type'},"size"=>$table_name->column[$k]->attributes()->{'size'},"required"=>$table_name->column[$k]->attributes()->{'required'}),
                    array("name"=>$table_name->column[$l]->attributes()->{'name'}, "type"=>$table_name->column[$l]->attributes()->{'type'},"size"=>$table_name->column[$l]->attributes()->{'size'},"required"=>$table_name->column[$l]->attributes()->{'requried'})
                    
                );
                */
                 /*method 2   */
               
                $user0=array();
                $user1=array();
                $user2=array();
                $user3=array();

                $user0 = array("name"=>(string)$table_name->column[$i]->attributes()->{'name'}, "type"=>(string)$table_name->column[$i]->attributes()->{'type'},"size"=>(string)$table_name->column[$i]->attributes()->{'size'},"primaryKey"=>(string)$table_name->column[$i]->attributes()->{'primaryKey'},"autoIncrement"=>(string)$table_name->column[$i]->attributes()->{'autoIncrement'}, "required"=>(string)$table_name->column[$i]->attributes()->{'required'});
                $user1 = array("name"=>(string)$table_name->column[$j]->attributes()->{'name'}, "type"=>(string)$table_name->column[$j]->attributes()->{'type'},"size"=>(string)$table_name->column[$j]->attributes()->{'size'},"required"=>(string)$table_name->column[$j]->attributes()->{'required'});
                $user2 = array("name"=>(string)$table_name->column[$k]->attributes()->{'name'}, "type"=>(string)$table_name->column[$k]->attributes()->{'type'},"size"=>(string)$table_name->column[$k]->attributes()->{'size'},"required"=>(string)$table_name->column[$k]->attributes()->{'required'});
                $user3 = array("name"=>(string)$table_name->column[$l]->attributes()->{'name'}, "type"=>(string)$table_name->column[$l]->attributes()->{'type'},"size"=>(string)$table_name->column[$l]->attributes()->{'size'},"required"=>(string)$table_name->column[$l]->attributes()->{'requried'});
                 
                //echo "****"{$user0['name']};
                         /*
                         //echo "***".gettype((string)$table_name->column[$i]->attributes()->{'name'});
                
                $name_str=array();
                $name_str1=array();
                $name_str2=array();
                $name_str3=array();
               // echo $user[0]['name'];
                   $n=0;
                  
                 foreach($user[$i] as $x => $x_value) {
                    //echo  $x_value;
                   array_push($name_str,(string)$x_value);
                    
                   // echo "<br>*********".$name_str[$n++];
                   // echo gettype($name_str[0]);
                 }
                 foreach($user[$j] as $x => $x_value) {
                    echo  $x_value;
                    array_push($name_str1,(string)$x_value);
                    echo "<br>";
                 }
        
                    foreach($user[$k] as $x => $x_value) {
                        echo  $x_value;
                        array_push($name_str2,(string)$x_value);
                        echo "<br>";
                }
                foreach($user[$l] as $x => $x_value) {
                    echo  $x_value;
                    array_push($name_str3,(string)$x_value);
                    echo "<br>";
                }
                */
                
           /* 
           $id = $column[0]['name'];
            $name = $column[1]['name'];
            $email = $column[2]['name'];
            $password = $column[3]['name'];
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

                $sql = "CREATE TABLE $table_name (
                $user[0]['name'] $user[0]['type']($user[0]['size'])  AUTO_INCREMENT PRIMARY KEY, 
                $name VARCHAR(30) NOT NULL,
                $email VARCHAR(50) NOT NULL,
                $password VARCHAR(40),
                UNIQUE ($email)
                )";
             */

                $sql = "CREATE TABLE $table_name1(
                    {$user0['name']} {$user0['type']}({$user0['size']}) AUTO_INCREMENT PRIMARY KEY,
                    {$user1['name']} {$user1['type']}({$user1['size']}) NOT NULL,
                    {$user2['name']} {$user2['type']}({$user2['size']}) NOT NULL,
                    {$user3['name']} {$user3['type']}({$user3['size']}) NOT NULL,
                    UNIQUE ({$user2['name']})
                )";
                
                /*
                $sql = "CREATE TABLE $table_name1(
                    $name_str[0] $name_str[1]($name_str[2]) AUTO_INCREMENT PRIMARY KEY,
                    $name_str1[0] $name_str1[1]($name_str1[2]) NOT NULL,
                    $name_str2[0] $name_str2[1]($name_str2[2]) NOT NULL,
                    $name_str3[0] $name_str3[1]($name_str3[2]) NOT NULL,
                    UNIQUE ($name_str2[0])
                )";
                */
             echo $sql; 
             
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