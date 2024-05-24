<?php
declare(strict_types=1);

function is_input_empty(string $Firstname, string $Lastname,string $Mail,string $PhoneNumber, string $Streetname , string $HouseNumber , string $Zipcode ,string $Password)
{
    if (empty($Firstname) || empty($Lastname) || empty($Mail) || empty($PhoneNumber) || empty($Streetname) || empty($HouseNumber) ||empty($Zipcode) || empty($Password)) {
        return true;
    } else {
        return false;
    }
}

function is_Mail_invalid(string $Mail)
{
    if (!filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_Mail_taken(object $pdo, string $Mail)
{
    if (get_email($pdo, $Mail)) {
        return true;
    } else {
        return false;
    }
}

function is_Mail_registred(object $pdo, string $Mail)
{
    if (get_email($pdo, $Mail)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $Firstname, string $Lastname,string $Mail,string $PhoneNumber, string $Streetname , string $HouseNumber , string $Zipcode ,string $Password)
{
    set_user($pdo, $Firstname, $Lastname, $Mail, $PhoneNumber,  $Streetname ,  $HouseNumber ,  $Zipcode ,$Password);
}