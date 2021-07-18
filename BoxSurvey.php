<html>
<head>
	<title>Aplikacija za upravljanje vremenom</title>
</head>
<body>
<h2>Forma koja će izvršiti proračun raspoređivanja vašeg vremena.</h2>
<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="POST">
    IME: <input type="text" name="name1">
    <br><br>
    PREZIME: <input type="text" name="name2">
    <br><br>
    GODINE: <input type="text" name="age">
    <br><br>
    Razred: <input type="text" name="grade">
    <br><br>
    Koliko braća i sestara imaš?: <input type="text" name="siblings">
    <br><br>
    U koliko sati ideš da spavaš?: <input type="time" name="sleeps"> 
    <br><br>   
    U koliko sati se budiš?: <input type="time" name="wakes">
    <br><br>
    Koliko vremena potrošiš da uradiš domaći zadatak?: <input type="time" name="homework">
    <br><br>
    Koliko vremena potrošiš da gledaš TV/DVD dnevno?: <input type="time" name="TV/DVD">
    <br><br>
    Koliko vrmena potrošiš da igraš video igru na konzoli ili kompjuteru?: <input type="time" name="comp/games">
    <br><br>
    Koliko vremena provodiš sa porodicom dnevno?: <input type="time" name="familytime">
    <br><br>
    Koliko vremena provodiš s drugarima dnevno?: <input type="time" name="friendstime">
    <br>
    <p><b>Savet: klikni ikonu sa satom da selektuješ vreme</b></p>
    <br><br>
    <!--<input type="button" name="prikaz" value="Prikazi proracun">-->
    <input type="submit" name="posalji" value="Pošalji podatke u bazi">
</form>
<!--
<form>
  <p>Name: <input type="text" name="fullname" /></p>
  <p>Day of month you were born:
     <select name="dayofmonth">
       <script>
         for ($i=1; $i<=31; $i++)
         {
           echo ("<option>" + $i + "</option>");
         }
       </script>
     </select>
</form>
-->

</body>
</html> <!--End-->


<?php
    /*
    class Ucenik {
        public $ime;
        public $prezime;

        public function __construct($Ime, $Prezime) {
            $this->ime = $Ime;
            $this->prezime = $Prezime;
        }
    }
    */

    //include("Ucenik.php");

        class Ucenik
        {
            public $_ime;
            public $_prezime;
            public $_godine;
            public $_razred;
            public $_braca;
            public $_spavanje;
            public $_budjenje;
            public $_domaci;
            public $_tv;
            public $_igra;
            public $_porodica;
            public $_prijatelji;

            public function __construct($Ime, $Prezime, $Godine, $Razred, $Braca, $Spavanje, $Budjenje, $Domaci, $TV, $Igra, $Porodica,
                                        $Prijatelji) {
                $this->_ime = $Ime;
                $this->_prezime = $Prezime;
                $this->_godine = $Godine;
                $this->_razred = $Razred;
                $this->_braca = $Braca;
                $this->_spavanje = $Spavanje;
                $this->_budjenje = $Budjenje;
                $this->_domaci = $Domaci;
                $this->_tv = $TV;
                $this->_igra = $Igra;
                $this->_porodica = $Porodica;
                $this->_prijatelji = $Prijatelji;
            }

            public function dobaviIme() {
                return "$this->ime " . "$this->prezime" . "<br>";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // definiši promenljive i postavi prazne vrednosti
        $name1Err = $name2Err = $ageErr = $gradeErr = $siblingsErr = "";
        $name1 = $name2 = $age = $grade = $siblings = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name1"])) {
                $nameErr = "Name is required";
            } else {
                $name1 = test_input($_POST["name1"]);
            }

            if (empty($_POST["name2"])) {
                $nameErr = "Name is required";
            } else {
                $name2 = test_input($_POST["name2"]);
            }

            if (empty($_POST["age"])) {
                $ageErr = "Godine su potrebne";
            } else {
                $age = test_input($_POST["age"]);
            }

            if (empty($_POST["grade"])) {
                $gradeErr = "Razred je potreban";
            } else {
                $grade = test_input($_POST["grade"]);
            }

            if (empty($_POST["siblings"])) {
                $siblingsErr = "Broj braća i sestara je potreban";
            } else {
                $siblings = test_input($_POST["siblings"]);
            }

            echo "Dobar dan! Hvala $name1 na odgovoru naše ankete!<br>";
            echo "Učenik $name1 $name2<br>";
            echo "Godina rođenja $age <br>";
            echo "Trenutna školska godina $grade<br>";
            echo "Broj braća i sestara $siblings<br>";
        }

            //$cookie_name = $name1;
            //$cookie_value = $name1 . " " . $name2;
            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        function UnesiuBazu($RedniBroj, $Ime, $Prezime, $Godine, $Razred, $Braca, $Spavanje, $Budjenje, $Domaci, $TV, $Igra, $Porodica,
                            $Prijatelji) {
            print ("<h2>Korak 1: Povezivanje sa serverom baze podataka</h2>\n");
            $conn = mysqli_connect("localhost", "root", "");
            if ($conn->connect_error) {
                print("<h2>Pokušaj povezivanja s bazom nije uspeo");
            } else {
                print("<p>Povezivanje uspostavljeno</p>");
            }
            print ("<h2>Korak 2: Odabiranje baze podataka</h2>\n");
            $conn->select_db("anketa");
            if ($conn->connect_error) {
                print ("<h2>Pokušaj odabiranje baze nije uspeo");
            } else {
                print ("<h2>Odabiranje baze podataka je uspelo");
            }
            print("<h2>Korak 3: Izvrši SQL upit!</h2>");
            $sql = "INSERT INTO `ucenik` (`RedniBroj`, `Ime`, `Prezime`, `Godine`, `Razred`, `BracaISestara`, `Spavanje`, `Ustajanje`, `Domaci`, `TV`, `VideoIgre`, `Porodica`, `Drugari`)
                VALUES ('{$RedniBroj}', '{$Ime}', '{$Prezime}', '{$Godine}', '{$Razred}', '{$Braca}', '{$Spavanje}', '{$Budjenje}', '{$Domaci}', '{$TV}', '{$Igra}', '{$Porodica}', '$Prijatelji');";
            $conn->query($sql);
            if ($conn->connect_error) {
                print("<h2>Izvršavanje upita nije uspelo. Greška je:" . $conn->error());
            }
            else {
                print("<p>Upit se izvršio uspešno!</p>");
            }
            print("<h2>Korak 5: Zatvaranje konekcije sa serverom baze podataka</h2>\n");
            $conn->close();
        }

        function IzvadiIzBaze() {
            print ("<h2>Korak 1: Povezivanje sa serverom baze podataka</h2>\n");
            $conn = mysqli_connect("localhost", "root", "");
            if ($conn->connect_error) {
                print("<h2>Pokušaj povezivanja s bazom nije uspeo");
            } else {
                print("<p>Povezivanje uspostavljeno</p>");
            }
            print ("<h2>Korak 2: Odabiranje baze podataka</h2>\n");
            $conn->select_db("anketa");
            if ($conn->connect_error) {
                print ("<h2>Pokušaj odabiranje baze nije uspeo");
            } else {
                print ("<h2>Odabiranje baze podataka je uspelo");
            }
            print("<h2>Korak 3: Izvrši SQL upit!</h2>");
            $sql = "SELECT RedniBroj FROM `ucenik` ORDER BY RedniBroj DESC LIMIT 1";
            $result = $conn->query($sql);
            if ($conn->connect_error) {
                print("<h2>Izvršavanje upita nije uspelo. Greška je:" . $conn->error());
            }
            else {
                print("<p>Upit se izvršio uspešno!</p>");
            }
            $row_array = mysqli_fetch_array($result);
            print("<h2>Korak 5: Zatvaranje konekcije sa serverom baze podataka</h2>\n");
            $conn->close();
            return $row_array[0];
        }

        // definiši promenljive i postavi prazne vrednosti
        $sleepsErr = $wakesErr = $homeworkErr = $tvErr = $compErr = $familytimeErr = $friendstimeErr = "";
        $sleeps = $wakes = $homework = $tv = $comp = $familytime = $friendstime = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['sleeps'])) {
                $ageErr = "Godine su potrebne";
            } else {
                $age = $_POST['sleeps'];
            }

            if(empty($_POST['wakes'])) {
                $wakesErr = "Buđenje su potrebne";
            } else {
                $wakes = $_POST['wakes'];
            }

            if(empty($_POST['homework'])) {
                $homeworkErr = "Domaci je potrebno";
            }
            else {
                $homework = $_POST['homework'];
            }

            if(empty($_POST['TV/DVD'])) {
                $tvErr = "TV je potrebno";
            }
            else {
                $tv = $_POST['TV/DVD'];
            }

            if(empty($_POST['comp/games'])) {
                $compErr = "Comp je potrebno";
            }
            else {
                $comp = $_POST['comp/games'];
            }

            if(empty($_POST['familytime'])) {
                $familyTime = "Vreme s porodicom je potrebno";
            }
            else {
                $familytime = $_POST['familytime'];
            }

            if(empty($_POST['friendstime'])) {
                $friendstimeErr = "Vreme s prijateljima je potrebno";
            }
            else {
                $friendstime = $_POST['friendstime'];
            }

            $tvyearly = (int)$tv * 365;
            $homeworkyearly = (int)$homework * 365;
            $gamesyearly = (int)$comp * 365;
            $relaxingyearly = (int)$familytime * 365;
            $friendsyearly = (int)$friendstime * 365;

            echo "<br>U odnosu na informacije koje si uneo, potrošićeš:<br>";
            echo "$tvyearly sati gledajući TV ili filmove godišnje.<br>";
            echo "$homeworkyearly sati radeći domaći godišnje.<br>";
            echo "$gamesyearly sati godišnje ispred kompjuterskog ekrana ili televizora. <br>";
            echo "$relaxingyearly sati po godini družeći se s porodicom ili drugarima.<br>";
            echo "$friendsyearly sati po godini družeći se s drugarima.<br>";

            $yearstofinish = 8 - (int)$grade;
            $hourshomework = (int)$yearstofinish * 365 * (int)$homework;
            $hoursscreen = (int)$yearstofinish * 365 * (int)$comp + (int)$yearstofinish * 365 * (int)$tv;
            $p = (int)$hoursscreen % 100;
            echo "<br>U odnosu na trenutnu školsku godinu<br>";
            echo "$yearstofinish godina dok škola nije završena<br>";
            echo "$hourshomework sate potrošene na rad domaćih zadataka<br>";
            echo "$hoursscreen  sati potrošenih gledajući u ekran<br>";
            echo "$p% budnog vremena ispred ekrana.<br>";

            $rednibroj = IzvadiIzBaze();
            UnesiuBazu($rednibroj, $name1, $name2, $age, $grade, $siblings, $sleeps, $wakes, $homework, $tv, $comp, $familytime, $friendstime);
        }

/*  $to = "trickovic993@gmail.com";
    $subject = "Marko Trickovicevi rezultati";
    $message = "Student $firstname $lastname<br>Years old $years <br>Year in school $school<br>Number of sibilings $sibilings<br>";
    $retcode = true;
    try {
        $retcode = mail($to, $subject, $message);
    } catch (Exception $e) {
        echo "E-mail was not sent, error has occured " . $e;
    } finally {
        echo "E-mail was not sent, error has occured.";
    } */
?>