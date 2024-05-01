<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алешин А.Е.</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>О прекрасных поэтах</h1>
        </header>
        <div class="poem-container">
            <div class="poem" id="poem">
                Вы помните,
                Вы всё, конечно, помните,
                Как я стоял,
                Приблизившись к стене,
                Взволнованно ходили вы по комнате
                И что-то резкое
                В лицо бросали мне
                
                Вы говорили:
                Нам пора расстаться,
                Что вас измучила
                Моя шальная жизнь,
                Что вам пора за дело приниматься,
                А мой удел —
                Катиться дальше, вниз.
                
                Любимая!
                Меня вы не любили.
                Не знали вы, что в сонмище людском
                Я был как лошадь, загнанная в мыле,
                Пришпоренная смелым ездоком.
                
                Не знали вы,
                Что я в сплошном дыму,
                В развороченном бурей быте
                С того и мучаюсь, что не пойму —
                Куда несет нас рок событий.
                
                Лицом к лицу
                Лица не увидать.
                Большое видится на расстоянье.
                Когда кипит морская гладь —
                Корабль в плачевном состоянье.
                
                Земля — корабль!
                Но кто-то вдруг
                За новой жизнью, новой славой
                В прямую гущу бурь и вьюг
                Ее направил величаво.
                
                Ну кто ж из нас на палубе большой
                Не падал, не блевал и не ругался?
                Их мало, с опытной душой,
                Кто крепким в качке оставался.
                
                Тогда и я,
                Под дикий шум,
                Но зрело знающий работу,
                Спустился в корабельный трюм,
                Чтоб не смотреть людскую рвоту.
                
                Тот трюм был —
                Русским кабаком.
                И я склонился над стаканом,
                Чтоб, не страдая ни о ком,
                Себя сгубить
                В угаре пьяном.
                
                Любимая!
                Я мучил вас,
                У вас была тоска
                В глазах усталых:
                Что я пред вами напоказ
                Себя растрачивал в скандалах.
                
                Но вы не знали,
                Что в сплошном дыму,
                В развороченном бурей быте
                С того и мучаюсь,
                Что не пойму,
                Куда несет нас рок событий…
                
                Теперь года прошли.
                Я в возрасте ином.
                И чувствую и мыслю по-иному.
                И говорю за праздничным вином:
                Хвала и слава рулевому!
                
                Сегодня я
                В ударе нежных чувств.
                Я вспомнил вашу грустную усталость.
                И вот теперь
                Я сообщить вам мчусь,
                Каков я был,
                И что со мною сталось!
                
                Любимая!
                Сказать приятно мне:
                Я избежал паденья с кручи.
                Теперь в Советской стороне
                Я самый яростный попутчик.
                
                Я стал не тем,
                Кем был тогда.
                Не мучил бы я вас,
                Как это было раньше.
                За знамя вольности
                И светлого труда
                Готов идти хоть до Ла-Манша.
                
                Простите мне…
                Я знаю: вы не та —
                Живете вы
                С серьезным, умным мужем;
                Что не нужна вам наша маета,
                И сам я вам
                Ни капельки не нужен.
                
                Живите так,
                Как вас ведет звезда,
                Под кущей обновленной сени.
                С приветствием,
                Вас помнящий всегда
                Знакомый ваш
                Сергей Есенин.
            </div>
            <div class="author-info">
                <img src="images/esenin.png" alt="Сергей Есенин" id="eseninImage" onclick="toggleImage()">
                <span>Сергей Есенин</span>
            </div>
        </div>
        <p class="year">1924 г.</p>
        <button id="toggleButton" class="more-button" onclick="togglePoem()">Развернуть</button>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
                <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form" type="text" name="title" placeholder="Заголовок вашего поста">
                    <textarea name="text" class="form_width" rows="10" placeholder="Введите текст вашего поста..."></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit" value="upload">Сохранить пост!</button>
                </form>
            </div>
        </div>
    <footer class="footer">
        Разработчик Алешин А. Е.
    </footer>
    <script src="js/script.js"></script>
</body>

</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link, $sql)) die("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>
