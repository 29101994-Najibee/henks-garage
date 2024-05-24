<?php declare(strict_types=1);

function get_email(object $pdo, string $Mail)

{
    $query = 'SELECT Mail FROM customer WHERE Mail = :Mail;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $Firstname, string $Lastname, string $Mail, string $PhoneNumber, string $Streetname, string $HouseNumber, string $Zipcode, string $Password)
{
    $query =
        'INSERT INTO customer (Firstname, Lastname, Mail, PhoneNumber, Streetname, HouseNumber, Zipcode, Password) VALUES (:Firstname, :Lastname, :Mail, :PhoneNumber, :Streetname, :HouseNumber, :Zipcode, :Password);';
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12,
    ];

    $hashPwd = password_hash($Password, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(':Firstname', $Firstname);
    $stmt->bindParam(':Lastname', $Lastname);
    $stmt->bindParam(':Mail', $Mail);
    $stmt->bindParam(':PhoneNumber', $PhoneNumber);
    $stmt->bindParam(':Streetname', $Streetname);
    $stmt->bindParam(':HouseNumber', $HouseNumber);
    $stmt->bindParam(':Zipcode', $Zipcode);
    $stmt->bindParam(':Password', $hashPwd);
    $stmt->execute();
}
