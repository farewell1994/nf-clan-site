<?php include "./config.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php echo $generalConfig['clanName']; ?> | Карты</title>
    <?php include("./styles.html"); ?>
</head>
<body style="background-color: <?php echo $generalConfig['background']; ?>">
<div class="container">
    <?php include('./menu.html'); ?>
    <div id="top-content" class="text-center">
        <h3>Карты игрового мира</h3>
    </div>
    <div>
        <div id="links" class="links">
                <?php
                $maps = [
                    ["caption" => "Лес", "src" => "./images/maps/forest.jpg"],
                    ["caption" => "Дремучий лес", "src" => "./images/maps/dforest.jpg"],
                    ["caption" => "Пещеры. Вход", "src" => "./images/maps/ecaves.jpg"],
                    ["caption" => "Пещеры. Уровень 1", "src" => "./images/maps/1caves.jpg"],
                    ["caption" => "Пещеры. Уровень 2", "src" => "./images/maps/2caves.jpg"],
                    ["caption" => "Пещеры. Уровень 3 (тупиковый)", "src" => "./images/maps/3caves.jpg"],
                    ["caption" => "Пещеры. Уровень 3 (проходной)", "src" => "./images/maps/3freecaves.jpg"],
                    ["caption" => "Пещеры. Уровень 4", "src" => "./images/maps/4caves.jpg"],
                    ["caption" => "Пещеры. Уровень 5", "src" => "./images/maps/5caves.jpg"],
                    ["caption" => "Златолюбия. Роща", "src" => "./images/maps/zlat1.jpg"],
                    ["caption" => "Златолюбия. Берег реки", "src" => "./images/maps/zlat2.jpg"],
                    ["caption" => "Златолюбия. Пещера", "src" => "./images/maps/zlat3.jpg"],
                    ["caption" => "Златолюбия. Терраса", "src" => "./images/maps/zlat4.jpg"],
                    ["caption" => "Златолюбия. Храм", "src" => "./images/maps/zlat5.jpg"],
                    ["caption" => "Берлога зла", "src" => "./images/maps/clancave.jpg"],
                    ["caption" => "ХТП. Вход", "src" => "./images/maps/htp_e.jpg"],
                    ["caption" => "ХТП. Крыло тьмы", "src" => "./images/maps/htp_dark.jpg"],
                    ["caption" => "ХТП. Крыло света", "src" => "./images/maps/htp_light.jpg"],
                    ["caption" => "ХТП. Крыло Хаоса", "src" => "./images/maps/htp_chaos.jpg"],
                    ["caption" => "Катакомбы. Сточные трубы", "src" => "./images/maps/kat1.jpg"],
                    ["caption" => "Катакомбы. Коллектор", "src" => "./images/maps/kat2.jpg"],
                    ["caption" => "Катакомбы. Бункер", "src" => "./images/maps/kat3.jpg"],
                    ["caption" => "Катакомбы. Подземный переход", "src" => "./images/maps/kat4.jpg"],
                    ["caption" => "Катакомбы. Пещера", "src" => "./images/maps/kat5.jpg"],
                    ["caption" => "Ледовое побоище", "src" => "./images/maps/ice_battle.jpg"],
                    ["caption" => "Казематы", "src" => "./images/maps/kaz.jpg"],
                    ["caption" => "Осада замка", "src" => "./images/maps/castle_battle.jpg"],
                    ["caption" => "Ущелье безумия", "src" => "./images/maps/ub.jpg"],
                ];
                foreach ($maps as $map) {
                    echo '<a class="nf-map" href="' . $map['src'] . '" title="' . $map['caption'] . '"><img src="' . $map['src'] . '" alt="' . $map['caption'] . '"></a>';
                }
                ?>
        </div>
    </div>
    <div id="source" class="text-center">
        Сайт является  <a target="_blank" href="https://github.com/farewell1994/nf-clan-site">Open source</a> проектом.
        Обратная связь <a href="mailto:farewell483@gmail.com">farewell483@gmail.com</a> или <a target="_blank" href="https://neverfate.ru/inf.php?cid=1273146797">Kill My Teacher</a>
    </div>
</div>
<?php include('./nf_script.html'); ?>
<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
</div>
<script>
    $(document).ready(function () {
        $("#links").on("click", function (e) {
            var target = e.target,
                link = target.src ? target.parentNode : target,
                options = { index: link, event: e },
                links = $(this).find('a');
            blueimp.Gallery(links, options)
        });
    });
</script>
</body>
</html>
