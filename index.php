<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="general.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Koha Library</title>
</head>
<body>   
    <?php 
    //Getting JSON
    $url = "https://prosentient.intersearch.com.au/cgi-bin/koha/svc/report?id=1&annotated=1";
    $json = file_get_contents($url);
    $json_data = json_decode($json, true);
    ?>

    <div class ="container">
        <div class ="content">
            <!-- Looping through JSON -->
            <?php foreach($json_data as  $item): ?>
                <div class ="card">
                    <div class="left">
                        <a class="primary" href="#"> 
                            <?= $item['title']; ?>
                        </a>
                        <h2 class="secondary">
                            <?= $item['Subjects']; ?>
                        </h2>
                        <!-- Checking if content is available and display if yes -->
                        <?php if($item['author']) : ?>
                            <p>by <b><?= $item['author']; ?></b>. <p>
                        <?php endif; ?>

                        <p>Type: <span><?= $item['type']; ?> </span> </p>

                        <?php if( $item['copyrightdate']) : ?>
                            <p>Copyright: <span> <?= $item['copyrightdate']; ?> </span></p>
                        <?php endif; ?>

                        <?php if($item['biblionumber']) : ?>
                            <p>biblionumber: <span><?= $item['biblionumber']; ?> </span></p>
                        <?php endif; ?>

                        <?php if($item['isbn']) : ?>
                            <p>isbn: <span><?= $item['isbn']; ?> </span></p>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <img src="book.jpg" alt="Books" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 
</body>
</html>