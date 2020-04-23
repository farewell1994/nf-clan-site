<?php
include "./config.php";
include("./functions.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php echo $generalConfig['clanName'] ?></title>
    <?php include("./styles.html"); ?>
</head>
<body style="background-color: <?php echo $generalConfig[ 'background' ]; ?>">
<div class="container">
    <?php include('./menu.html'); ?>
    <div id="crystal-energy" class="text-right">Уровень зарядки Кристалла
        Грез: <?php echo (file_get_contents("https://api.neverfate.ru/cristalenergy.php")) / 100; ?>%
    </div>
    <div id="top-content" class="text-center">
        <h4>
            Приветствуем тебя на нашем сайте клана <?php echo $generalConfig['clanName'] ?>
        </h4>
    </div>

    <div class="alert alert-light" id="rules">
        <h3>Устав</h3>
        <?php echo $generalConfig['rules'] ?>
        <hr/>
    </div>
    <div class="alert alert-light" id="chars">
        <h3 data-toggle="collapse" href="#chars-table" role="button" aria-expanded="false" aria-controls="chars-table"
            class="chars-table-header">Состав <span>(нажмите для подробной информации)</span></h3>
        <div class="collapse" id="chars-table">
            <div class="card card-body">
                <?php getClanTable($generalConfig['clanName']); ?>
                <p>Посмотреть участников других кланов</p>
                    <?php
                    $clans = unserialize(file_get_contents("https://api.neverfate.ru/clans.php"));
                    if ($clans) {
                        echo "<select>";
                        foreach ($clans as $clan) {
                            echo "<option>" . $clan["cname"] . "</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "К сожалению, возникла ошибка при загрузке кланов. Попробуйте воспользоваться сервисом позже, или обратитесь к администратору";
                    }
                    ?>
                <div class="another-clan-chars"></div>
            </div>
        </div>
        <hr/>
    </div>

    <div class="alert alert-light" id="history">
        <h3>История</h3>
        <?php echo $generalConfig['history'] ?>
        <hr/>
    </div>

    <div class="alert alert-light" id="join">
        <h3>Вступление в клан</h3>
        <?php echo $generalConfig['join'] ?>
        <hr/>
    </div>

    <div id="source" class="text-center">
        Сайт является  <a target="_blank" href="https://github.com/farewell1994/nf-clan-site">Open source</a> проектом.
        Обратная связь <a href="mailto:farewell483@gmail.com">farewell483@gmail.com</a> или <a target="_blank" href="https://neverfate.ru/inf.php?cid=1273146797">Kill My Teacher</a>
    </div>
</div>
<?php 
include('./nf_script.html'); 
include('./mail_ru_counter.html');
?>
<script>
    $(document).ready(function () {
        var clanSelect = $("#chars-table select");
        clanSelect.select2({
            width: "100%"
        });

        clanSelect.on("change", function () {
            var result = $(this).val();
            $.ajax({
                url: 'functions.php?clan=' + result,
                type: 'GET',
                success: function (data) {
                    $(".another-clan-chars").html(data);
                },
                error: function () {
                    $(".another-clan-chars").html("Возникла ошибка при загрузке участников клана " + result);
                }
            });
        });
    });
</script>
</body>
</html>
