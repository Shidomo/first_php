<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Blog Master";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <?php 
            require_once "lib/mysql.php";
            $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
            $query = $pdo->query($sql);
            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo "<div class='post'> 
                <h1>". $row->title ."</h1>
                <p>".$row->anons ."</p>
                <p class='avtor'>Автор : <span>".$row->avtor ."</span></p>
                <a href='/post.php?id=".$row->id . "'title='" . $row->title."'>Прочитать</a>
                </div>";
            }
        ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
            $("#add_chat").click(function() {
            let mess = $('#chat').val();

            $.ajax({
                url: 'ajax/add_mess_live_chat.php',
                type: 'POST',
                cache: false,
                data: {
                    'chat' : mess,
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                         $(".live-chat").prepend(`<div class='post'>
                            <p>${mess}</p>
                        </div>`);
                        $("#error-block").hide();
                        $("#chat").val("");
                    } else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                
            }});
        });
        $(document).ready(function(){ 

        show(); 

        setInterval('show()',500); 

        }); 

        </script>
</body>
</html>