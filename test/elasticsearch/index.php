<?php

    require_once 'app/init.php';

    if(isset($_GET['q'])) {
        $q = $_GET['q'];

        $query = $es->search([
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            'match' => ['title' => $q],
                            //'match' => ['body' => $q],
                            //'match' => ['keywords' => $q],
                        ]
                    ]
                ]
            ]
        ]);

        if($query['hits']['total'] >= 1) {
            $results = $query['hits']['hits'];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search with Elasticsearch</title>
    </head>
    <body>
        <form action="" method="get" autocomplete="off">
            <label>
                Søk på noe...
                <input type="text" name="q">
            </label>
            <input type="submit" value="Søk">
        </form>
        <?php
            if(isset($results)) {
                foreach($results as $r) {
                    ?>
                        <div class="result">
                            <a href="<?php echo $r['_id']; ?>"><?php echo $r['_source']['title']; ?></a>
                            <div class="result-keywords"><?php echo implode(', ', $r['_source']['keywords']); ?></div>
                        </div>
                    <?php
                }
            }
        ?>
    </body>
</html>