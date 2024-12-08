<?php
function database_create($name){

    global $IMAGINE_CONNECT_HOST;
    global $IMAGINE_CONNECT_USER;
    global $IMAGINE_CONNECT_PASS;

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect($IMAGINE_CONNECT_HOST, $IMAGINE_CONNECT_USER, $IMAGINE_CONNECT_PASS);
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
     
    // Attempt create database query execution
    $sql = "CREATE DATABASE ".$name ." CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci'";
    if(mysqli_query($link, $sql)){
        echo "Database created successfully";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);

}

function database_delete($name){

    global $IMAGINE_CONNECT_HOST;
    global $IMAGINE_CONNECT_USER;
    global $IMAGINE_CONNECT_PASS;

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect($IMAGINE_CONNECT_HOST, $IMAGINE_CONNECT_USER, $IMAGINE_CONNECT_PASS);
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
     
    // Attempt create database query execution
    $sql = "DROP DATABASE IF EXISTS ".$name;
    if(mysqli_query($link, $sql)){
        echo "Database delete successfully";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);

}

function database_list(){

    global $IMAGINE_CONNECT_HOST;
    global $IMAGINE_CONNECT_USER;
    global $IMAGINE_CONNECT_PASS;
    global $IMAGINE_CONNECT_PORT;

    $host = $IMAGINE_CONNECT_HOST;
    $port = $IMAGINE_CONNECT_PORT;
    $user = $IMAGINE_CONNECT_USER;
    $password = $IMAGINE_CONNECT_PASS; 

    $pdo = new PDO("mysql:host=$host;port=$port", $user, $password);
     
    $stmt = $pdo->query('SHOW DATABASES');
     
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $exit = array();

    foreach($databases as $database){

        $exit[] = $database;

    }

    return $exit;

}


?>