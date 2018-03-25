<?php
class conn_Db
{
    public static function connessione_Db()
    {
        //ricavo la path del file di configurazione dove sono inseriti i dati per la connesione al DB
        $path = dirname($_SERVER['SCRIPT_FILENAME']);
        require_once($path . "/config.php");

        //eseguo la connessione al DB
        $conn = mysqli_connect($host, $user, $pass, $db);
        if (mysqli_connect_errno()) {
            echo "Connessione al database non riuscita. ERRORE: " . mysqli_connect_error();
            exit();
        }
        //ritorno la variabile di connessione al DB
        return $conn;
    }
}
class metodi_Db extends conn_Db
{
    public static function agg_scadenza($title, $date, $className)
    {
        //normalizzazione data per inserimento nel DB
        $gg = substr($date, -10, 2);
        $mm = substr($date, -6, 1);
        $yyyy = substr($date, 6);

        //connessione al DB e inserimento della scadenza
        $conn = parent::connessione_Db();
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO scadenzario (title, anno, mese, giorno, className) VALUES (?, ?, ?, ?, ?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $alert = "<div class='alert alert-danger col-lg-4 ' role='alert'>Inserimento dei parametri nel DB non riuscita !!!</div>";
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $title, $yyyy, $mm, $gg, $className);
            mysqli_stmt_execute($stmt);
            $alert = "<div class='alert alert-success col-lg-4 ' role='alert'>Inserimento dei dati nel DB eseguito con successo !!!</div>";
        }
        //ritorno la variabile $alert
        return $alert;
    }

    public static function leggi_scadenze()
    {
        $conn = parent::connessione_Db();
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM scadenzario";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $alert = "<div class='container'><div class='alert alert-danger col-lg-4' role='alert'>Non è stato possibile effettuare il recupero delle scadenze!!!</div></div>";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['idscadenzario'];
                $title = $row['title'];
                $start = $row['anno'] . ", " . ($row['mese']-1) . ", " . $row['giorno'];
                $className = $row['className'];
                echo <<< END
 			{
        id: $id,
	      title: '$title',
	      start: new Date($start),
	      className: '$className'
 			},\r
END;
            }
        }
    }
    public static function mod_scadenza($id, $title, $className)
    {
        $id = $_POST['submit'];
        $title = $_POST['descrizione'];
        $className = $_POST['className'];
        $conn = parent::connessione_Db();
        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE scadenzario SET title = ?, className = ? WHERE idscadenzario = ?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $alert = "<div class='alert alert-danger col-lg-4' role='alert'>Non è stato possibile effettuare la modifica richiesta!!!</div>";
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $title, $className, $id);
            mysqli_stmt_execute($stmt);
            header("Refresh:1; url=index.php");
            $alert = "<div class='alert alert-success col-lg-4' role='alert'>la modifica richiesta è  stata effettuata con successo!!!</div>";
        }
        return $alert;
    }
}
