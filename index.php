<?php require __DIR__ . '/vendor/autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.1.min.js" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1>PHP Sandbox</h1>
            
            <h4>Spaceship Operator</h4>
            <p>Sorting array content using spaceship operator <=></p>
            <?php
                $faker = Faker\Factory::create();
                $names = [];
                foreach(range(1, 10) as $i) {
                    $names[] = [
                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName
                    ];
                }
            ?>
            
            <?php
                $key = (['first_name', 'last_name'])[rand(0, 1)];
                $dir = (['asc', 'desc'])[rand(0, 1)];
            ?>

            <div class="row">
                <p class="text-center"><em>Sort names <?= $dir ?> by <?= $key ?></em></p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                        echo '<pre>';
                        print_r($names);
                        echo '</pre>';
                    ?>
                </div>

                <?php 
                    usort($names, function($a, $b) use ($key, $dir) {
                        return ${$dir=='asc'?'a':'b'}[$key] <=> ${$dir=='asc'?'b':'a'}[$key];
                    });
                ?>

                <div class="col-md-6">
                    <?php
                        echo '<pre>';
                        print_r($names);
                        echo '</pre>';
                    ?>
                </div>
            </div>

        </div>
    </body>
</html>