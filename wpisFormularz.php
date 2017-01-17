<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <script src="jquery-3.1.1.slim.min.js" type="text/javascript">
    </script>
    <script src="jquery.maskedinput.min.js" type="text/javascript">
    </script>
	<title>Blog</title>
</head>
<body>
    <h1> Dodaj post </h1>
        <form action="wpis.php" method="POST" enctype="multipart/form-data">
        <p>
            Login: <input type="text" name="login"> 
        </p>
        <p>
            Hasło: <input type="password" name="password"> 
        </p>
        <p>
            Tekst: <textarea rows="10" cols="50" name="text"></textarea>
        </p>
        <p>
            Data <input type="text" name="date" id="date" onchange="setDate()"> 
        </p>
        <p>
            Czas: <input type="text" name="time" id="time" onchange="setTime()">
        </p>
        <input type="file" name="file0" onchange="addFiles()" /><br/>
        <div id="container">
        </div>
        <p>
            <input type="submit">
            <input type="reset">
        </p>
        </form>
    <script type=text/javascript>

        function addFiles() {
            var container = document.getElementById("container");
            var files = container.getElementsByTagName("input");
            var filesNumber = files.length;
            filesNumber++;
            var newFile = document.createElement("input");
            newFile.name = "file" + filesNumber;
            newFile.type = "file";
            newFile.onchange = addFiles;
            container.appendChild(newFile);
            container.appendChild(document.createElement("br"));
        }

        function setActualDate(){
            var date = new Date();
            var dateString = date.getFullYear() + "-" + ("0" + date.getMonth()+1).slice(-2) + "-" + date.getDate();
            document.getElementById("date").value=dateString;
        }

        function setActualTime(){
            var time = new Date();
            var timeString = time.getHours() + ":" + ("0" + time.getMinutes()).slice(-2);
            document.getElementById("time").value=timeString;
        }

        function setDate(){
            var date = document.getElementById("date").value.split("-");
            if (date[0] < 0){
                setActualDate();
                setActualTime();
            }
            if (date[1] < 0 || date[1] > 12){
                setActualDate();
                setActualTime();
            }
            if (date[2] < 0 || date[2] > 31){
                setActualDate();
                setActualTime();
            }
        }

        function setTime() {
            var time = document.getElementById("time").value.split(":");
            if (time[0] < 0 || time[0] > 23){
                setActualTime();
            }
            if (time[1] < 0 || time[1] > 59){
                setActualTime();
            }
        }

        function redTimeAndData() {
            $('document').ready(function(){
                $("#date").mask("9999-99-99");
                $("#time").mask("99:99");
            });
        }

        setActualDate();
        setActualTime();
        setDate();
        setTime();
        redTimeAndData();

    </script>
</body>
</html>