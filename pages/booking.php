<!-- NAVBAR-->
<?php include '../includes/header.php'; ?>

<div class="book-wrapper">
    <div class="flex-container">
        <form action="#" method="post">

            <div class="elem-group">
                <label for="adult">Erwachsene</label>
                <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
            </div>
            <div class="elem-group">
                <label for="child">Kinder</label>
                <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
            </div>
            <div class="elem-group">
                <label for="checkin-date">Check-in Date</label>
                <input type="date" id="checkin-date" name="checkin" required>
            </div>
            <div class="elem-group">
                <label for="checkout-date">Check-out Date</label>
                <input type="date" id="checkout-date" name="checkout" required>
            </div>
            <div class="elem-group">
                <label for="room-selection">Zimmerauswahl</label>
                <select id="room-selection" name="room_preference" required>
                    <option value="">Bitte wählen Sie von den folgenden Optionen!</option>
                    <option value="connecting">SUIT</option>
                    <option value="adjoining">Zweibett Zimmer</option>
                    <option value="adjacent">Einbett Zimmer</option>
                </select>
            </div>
            <hr>
            <!--<div class="elem-group">
            <label for="message">Anything Else?</label>
            <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
            /div>
             -->
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Verfügbarkeit prüfen</button>

        </form>
        </main>

    </div>
</div>

<!--FOOTER-->
<?php
    include_once '../includes/footer.php';
?>
