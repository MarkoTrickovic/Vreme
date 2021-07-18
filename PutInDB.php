<?php
    function UnesiuBazu($Ime, $Prezime, $Godine, $Razred, $Braca, $Spavanje, $Budjenje, $Domaci, $TV, $Igra, $Porodica,
                        $Prijatelji) {
        print ("<h2>Korak 1: Povezivanje sa serverom baze podataka</h2>\n");
        $conn = mysqli_connect("localhost", "root", "");
        if ($conn->connect_error) {
            print("<h2>Pokušaj povezivanja s bazom nije uspeo");
        } else {
            print("<p>Povezivanje uspostavljeno</p>");
        }
        print ("<h2>Korak 2: Odabiranje baze podataka</h2>\n");
        $conn->select_db("survey");
        if ($conn->connect_error) {
            print ("<h2>Pokušaj odabiranje baze nije uspeo");
        } else {
            print ("<h2>Odabiranje baze podataka je uspelo");
        }
        print("<h2>Korak 3: Izvrši SQL upit!</h2>");
        $sql = "INSERT INTO `student` (`FirstName`, `LastName`, `Business`, `School`, `Siblings`, `Bed`, `WakingUp`, `Homework`, `TV`, `Games`, `Family`, `Friends`)
        VALUES ('{$Ime}', '{$Prezime}', $Godine, $Razred, $Braca, '$Spavanje', '$Budjenje', '$Domaci', '$TV', '$Igra', '$Porodica', '$Prijatelji');";
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


//
    // Step 1: Connecting to the database server
    //
    print ("<h2>Step 1: Connecting to the database server</h2>\n");
    print ("<p>First we need to connect to the database server:</p>\n");

    
    //
    // Try connecting to the database server... you'll need to replace
    // your database server, username and password!
    // (Note that in real world production systems it is considered bad
    //  practice to 'hard-code' authentication credentials within your
    //  programs. Instead, you should store them outside of the code and
    //  load them when necessary.)
    //
    $conn = mysqli_connect("localhost", "root", "");

    //
    // We'll check to make sure that the connect worked using an if-statement
    // Once the page is successfully displaying the desired results, we can
    // simply comment out all these 'if' statements that check for errors.
    //
    if ($conn->connect_error)
    {
        print("<h2>Failed to connect to database!</h2>");
    }
    else
    {
        print("<p>Connection established</p>");
    }

    //
    // Step 2: Selecting the database
    //
    print ("<h2>Step 2: Selecting the database</h2>\n");
    $conn->select_db("survey");
    //$result = select_db("survey");
    if ($conn->connect_error)
    {
        print("<h2>Failed to select database!</h2>");
    }
    else
    {
        print("<p>Database selected successfully</p>");
    }

    //
    // Step 3: Run an SQL query!
    // First create the query in a variable of our own called $sql, then
    // run the query using the special mysql function. You might want to
    // insert info into your DB using phpMyAdmin to find out exactly
    // how your INSERT statement will look!
    //
    print("<h2>Step 3: Run a SQL query!</h2>");

    $sql = "INSERT INTO `student` (`FirstName`, `LastName`, `Business`, `School`, `Siblings`, `Bed`, `WakingUp`, `Homework`, `TV`, `Games`, `Family`, `Friends`) VALUES
    ('Dusan', 'Stanimirovic', 2004, 2008, 1, '02:34:00', '09:43:34', '03:20:00', '01:40:00', '03:30:00', '00:39:00', '01:40:00');";
    $conn->query($sql);
    if ($conn->connect_error)
    {
        print("<h2>Failed to run the query! Error is:" . $conn->error());
    }
    else
    {
        print("<p>query ran successfully!</p>");
    }
    //
    // Step 4: Process the results
    // When we're inserting information into a database, we don't actually
    // have any results to process... this'll come later when we're getting
    // data out of a database. So, we can skip step 4 for now!
    //
    //
    // Step 5: Close the connection with the database server
    // Although we don't _really_ need to do this (it'll be done for us)
    // it's good for us to know that it happens.
    //
    print("<h2>Step 5: Close the connection to the database server</h2>\n");
    $conn->close();
?>