<?php
session_start();
require("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedEvent = mysqli_real_escape_string($conn, $_POST['event']);
    $selectedBands = isset($_POST['bands']) ? $_POST['bands'] : [];

    if (!empty($selectedEvent) && !empty($selectedBands)) {

        $_SESSION['selectedEvent'] = $selectedEvent;
        $_SESSION['selectedBands'] = $selectedBands;

        $eventId = $selectedEvent;


        $conn->begin_transaction();

        try {
            foreach ($selectedBands as $bandId) {
                $bandId = mysqli_real_escape_string($conn, $bandId);

                $stmt = $conn->prepare("INSERT INTO bands_has_events (idevents, idbands) VALUES (?, ?)");
                $stmt->bind_param("ii", $eventId, $bandId);

                if (!$stmt->execute()) {
                    throw new Exception("Error: " . $stmt->error);
                }

                $stmt->close();
            }

            $conn->commit();

            header("Location: koppel.php");
            exit();
        } catch (Exception $e) {

            $conn->rollback();
            echo $e->getMessage();
        }

    } else {
        echo "Please select an event and at least one band.";
    }
}
?>