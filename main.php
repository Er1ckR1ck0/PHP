<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <style>
            body{
                background-color: #111111;
            }
            .cards {
                display: flex;
                flex-flow: column;
                height: 300PX;
                width: 280PX;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                padding: 6px;
                margin: 10px;
            }
            img{
                height: 150px;
                width: 280PX;
            }
            p{
                color: white;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            a{
                color: yellow;
            }
            .block{
                display: flex;
                flex-flow: row;
                width: 1340px;
                flex-wrap: wrap;
            }
        </style>
    </head>
    <body>
        <div class = "block">
        <?php
        $fd = fopen("article.txt", 'r') or die("не удалось открыть файл");
        $lines = file("article.txt");
        setlocale(LC_ALL, 'Russian_Russia.1251');
        for ($i = 0; $i < count($lines); $i++) {
            $line = fgets($fd);
            echo '<div class="cards">';
            echo '<img src="https://proprikol.ru/wp-content/uploads/2022/10/kartinki-s-mezhdunarodnym-dnem-gor-16-scaled.jpg">';
            echo '<p>';
            $new_string = '';
            echo '<p>';
            $line_length = strlen($line);
            for ($j = 0; $j <= 250; $j++) {
                if ($j < $line_length) {
                    $new_string .= $line[$j];
                }
                if ($j == 250) {
                    $new_string .= '...';
                    break;
                }
            }
            $space_count = 0;
            $link_count = 250;
            for ($j = 250; $j <= 250; $j--) {
                if ($new_string[$j] == ' ') {
                    $space_count++;
                }
                if ($space_count == 3) {
                    $link_count--;
                    break;
                }
                $link_count--;
            }
            if ($link_count >= 0) {
                echo substr($new_string, 0, $link_count + 2);
                echo '<a href="https://google.com">' . substr($new_string, $link_count + 2, strlen($new_string)) . '</a>';
            } else {
                echo $new_string;
            }
            echo '</p>';
            echo '</div>';
        }
        fclose($fd);
        ?>
        </div>
    </body>
</html>

<!-- <?php
        $fd = fopen("article.txt", 'r') or die("не удалось открыть файл");
        for ($i = 0; $i < 3; $i++) {
            $line = fgets($fd);
            if($line == ' '){
                continue;
            }
            else{
                echo '<div class = "block">';
                echo '<img src="https://proprikol.ru/wp-content/uploads/2022/10/kartinki-s-mezhdunarodnym-dnem-gor-16-scaled.jpg">';
                echo '<p>';
                $new_string = '';
                for($i = 0; $i < 250; $i++){
                    $new_string .= $line[$i];
                    echo $new_string;
                }
                echo $new_string;
                echo '</p>';
                echo '<p>';
                $string = $line;
                $lastThreeWords = array_slice($words, -3);
                $link = implode(" ", $lastThreeWords);
                $word = str_word_count($string, 1);
                echo $word;
                echo $line;
                echo '<a href = "google.ru">'.$link.'</a>';
                echo '</p>';
                echo '</div>';
            }
        }
        fclose($fd);
        ?> -->