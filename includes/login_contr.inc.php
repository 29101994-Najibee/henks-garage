<?php 
declare(strict_types=1);
function is_input_empty(string $Mail, string $Password){
    if(empty($Mail)|| empty($Password)){
        return true;
    }else{
        return false;
    }
}
function is_Mail_wrong( bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}
function is_password_wrong( string $Password ,string $hashPwd ){
    if(!password_verify($Password,$hashPwd )){
        return true;
    }else{
        return false;
    }
}