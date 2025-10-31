<?php require "../conn.php"; ?>
<?php

// Get id & type from header
$id = $_GET['id'];
$type = $_GET['type'];

if ($pdo) {
    switch ($type) {
        case "article":
            delete($pdo, $type, $id, "article.php");
            break;
        case "category":
            delete($pdo, $type, $id, "categories.php");
            break;
        case "author":
            delete($pdo, $type, $id, "author.php");
            break;
        default:
            break;
    }
} else {
    echo 'Error: ' . $e->getMessage();
}


function delete($pdo, $table, $id, $goto)
{

    $col = $table . "_id";

    try {
        // sql to delete a record
        $sql = "DELETE FROM $table WHERE $col = $id";

        // use exec() because no results are returned
        $pdo->exec($sql);
        echo "$table Deleted Successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $pdo = null;

    header("Location: ../$goto", true, 301);
    exit;
}
?>