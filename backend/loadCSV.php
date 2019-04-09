<?php
//   $databasetable = "student_at_risk";  
//   $fieldseparator = ","; 
//   $lineseparator = "\n";
//   $csvfile = "./ML_SRC/dropout_prediction.csv";
//   if(!file_exists($csvfile)) {
//     die("File not found. Make sure you specified the correct path.");
//   }

//   $pdo = DB::conn();

//   $affectedRows = $pdo->exec(
//     "LOAD DATA LOCAL INFILE "
//     .$pdo->quote($csvfile)
//     ." INTO TABLE `$databasetable` FIELDS TERMINATED BY "
//     .$pdo->quote($fieldseparator)
//     ."LINES TERMINATED BY "
//     .$pdo->quote($lineseparator)
//   );
//   echo "Loaded a total of $affectedRows records from this csv file.\n";


// get the csv file and open it up
    $file = "./ML_SRC/dropout_prediction.csv"; 
    $handle = fopen($file, "r"); 
    $pdo = DB::conn();

    try { 
        //delete the old record
        DB::query('DELETE FROM student_at_risk');
        // prepare for insertion
        $query_ip = $pdo->prepare('INSERT INTO student_at_risk (courseID, studentID, dropout) VALUES (?, ?, ?)');

        // unset the first line like this       
        fgets($handle);

        // created loop here
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $query_ip->execute($data);
        }       

        fclose($handle);

    } catch(PDOException $e) {
        die($e->getMessage());
    }
?>