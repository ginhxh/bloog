<?php

function get_postes(object $pdo): array {
    $query = 'SELECT * FROM `article` ORDER BY `article`.`created_time` DESC;';
    $stmt = $pdo->prepare($query);
   try{
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
    catch(PDOException $e){ echo 'Database Error: ' . $e->getMessage();
        return [];
    
    }

    

  
}

