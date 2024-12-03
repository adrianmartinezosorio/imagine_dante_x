<?php

function phpmyadmin_export($database,$filesql,$mode){

    if(!empty($database) && !empty($filesql) && !empty($mode)){

        global $IMAGINE_CONNECT;

        if($IMAGINE_CONNECT){

            global $IMAGINE_CONNECT_HOST;
            global $IMAGINE_CONNECT_USER;
            global $IMAGINE_CONNECT_PASS;

            $host = $IMAGINE_CONNECT_HOST;
            $user = $IMAGINE_CONNECT_USER;
            $password = $IMAGINE_CONNECT_PASS; 

            if($mode == "xampp"){
                $path_mysqldump = 'c:\xampp\mysql\bin\mysqldump';
                $command = $path_mysqldump.' --opt -u '.$user.' -p'.$password.' '.$database.' > '.$filesql.'.sql';
            }
            if($mode == "wamp"){
                $path_mysqldump = 'c:\wamp64\bin\mysql\mysql5.7.36\bin\mysqldump';
                $command = $path_mysqldump.' --user='.$user.' --password='.$password.' --host='.$host.' '.$database.' > '.$filesql.'.sql';
            }
            

            exec($command);

        }

    }

}



function phpmyadmin_import($database,$filesql){

    global $IMAGINE_CONNECT_HOST;
    global $IMAGINE_CONNECT_USER;
    global $IMAGINE_CONNECT_PASS;

    $path_mysqldump = 'c:\xampp\mysql\bin\mysql';
    $host = $IMAGINE_CONNECT_HOST;
    $user = $IMAGINE_CONNECT_USER;
    $password = $IMAGINE_CONNECT_PASS; 

    $command = $path_mysqldump.' -h' .$host .' -u' .$user .' --password="' .$password .'" ' .$database .' < ' .$filesql;

    exec($command);

}

?>