<pre>

<?php

print_r($_POST);

$min_sql_query = "INSERT INTO comments(postId, userId, comment) VALUES ('{$_GET['comment_to_save']}'),"
$result = $dbh->exec($min_sql_query);

foreacg($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
    echo "<pre>";
    print_r($post);

    echo "</pre>";
}


?>

</pre>
