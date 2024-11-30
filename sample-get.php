<?php
if($_GET){
    
    if(isset($_GET['action']) && !empty($_GET['action']) && isset($_GET['id']) && !empty($_GET['id'])){
        
        $id = $_GET['id'];
    
        $basicurl = ao(array("id=".$id));
        
        if($_GET['action'] == '000000000'){
            
            //update($c,array("obsoleto"),array("1"),$id,'conceptos');
            
            hdr($basicurl);
            
        }
        
        if($_GET['action'] == '000000000'){
            
            //update($c,array("obsoleto"),array("0"),$id,'conceptos');
            
            hdr($basicurl);
            
        }
        
    }
    
}else{
    exit();
}
?>