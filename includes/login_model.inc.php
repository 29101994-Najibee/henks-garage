<?php 
declare(strict_types=1);

function get_user(object $pdo, string $Mail){
    $query = 'SELECT * FROM customer WHERE Mail = :Mail;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}