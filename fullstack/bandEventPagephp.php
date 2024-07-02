<?php
session_start(); // Start de sessie
require("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedEvent = mysqli_real_escape_string($conn, $_POST['event']);
    $selectedBands = isset($_POST['bands']) ? $_POST['bands'] : [];

    if (!empty($selectedEvent) && !empty($selectedBands)) {
        
        $_SESSION['selectedEvent'] = $selectedEvent; // Sla de geselecteerde event-ID op in een sessievariabele
        $_SESSION['selectedBands'] = $selectedBands; // Sla de geselecteerde band-ID's op in een sessievariabele

        $eventId = $selectedEvent;

        // Begin een transactie
        $conn->begin_transaction();

        try {
            foreach ($selectedBands as $bandId) {
                $bandId = mysqli_real_escape_string($conn, $bandId);

                // Prepare and execute the insert statement
                $stmt = $conn->prepare("INSERT INTO bands_has_events (idevents, idbands) VALUES (?, ?)");
                $stmt->bind_param("ii", $eventId, $bandId);

                // Execute the statement
                if (!$stmt->execute()) {
                    throw new Exception("Error: " . $stmt->error);
                }

                // Close the statement
                $stmt->close();
            }

            // Commit de transactie
            $conn->commit();

            // Redirect to the confirmation page
            header("Location: koppel.php");
            exit();
        } catch (Exception $e) {
            // Rollback de transactie bij een fout
            $conn->rollback();
            echo $e->getMessage();
        }

    } else {
        echo "Please select an event and at least one band.";
  }
}
?>