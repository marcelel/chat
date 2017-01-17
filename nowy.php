<?php require 'menu.php';?>

<?php

$path = "/home/students/l/leksmarc/public_html/php";
$blogTitle = ($_POST['blogTitle']);
$login = ($_POST['login']);
$password = ($_POST['password']);
$description = ($_POST['text']);
$sem = sem_get(123);
sem_acquire($sem);
$addBlog = TRUE;
$blogs = glob('*', GLOB_ONLYDIR);
foreach($blogs as $blog){
    if ($blog == $blogTitle){
        $addBlog = FALSE;
        print_r("Blog o podanej nazwie już istnieje");
        break;
    }
    $isLogin = FALSE;
    $blogDir = opendir($blog);
    while (($line = readdir($blogDir)) !== false){
        if($line == "info.txt"){
            $info = fopen($path . "/" . $blog . "/" . $line, "r");
            $infoLogin = fgets($info);
            $infoLogin = rtrim($infoLogin);
            if (($login) == $infoLogin){
                $addBlog = FALSE;
                print_r("Użytkownik posiada już blog");
                $isLogin = TRUE;
                break;
            }
            fclose($info);
        }
    }
    if ($isLogin) {
        break;
    }
}

if(!empty($_POST['blogTitle']) && !empty($_POST['login']) && !empty($_POST['password']) && $addBlog) {
    mkdir($blogTitle);
    $file = fopen($blogTitle.'/info.txt', 'w');
    if (flock($file, LOCK_EX)) {
        fputs($file, $login);
        fputs($file, "\n");
        fputs($file, md5($password));
        fputs($file, "\n");
        fputs($file, $description);
        fflush($file);
        flock($file, LOCK_UN);
        echo ("Utworzono");
    }
    else {
        echo "Nie mozna uzyskac locka";
    }
    fclose($file);
}
else{
    echo "Pola nie moga byc puste";
}
sem_release($sem);
?>
