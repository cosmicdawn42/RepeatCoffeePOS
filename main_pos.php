<?php 
include 'header.php';
include 'navbar.php';
?>

<div class="pos-container">
    <div class="pos-grid" id="left-grid">
        <table id="order-table">
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="order-list">
                <!-- Orders will dynamically populate here -->
            </tbody>
        </table>
        <div>
            <p>Total: <span id="total-amount">0.00</span></p>
        </div>
    </div>
    <div class="pos-grid" id="right-grid">
        <div class="menu-grid">
            <!-- Menu Buttons -->
            <?php
            $menu_items = [
                "Americano" => 65.00, "Almond Latte" => 150.00,
                "Cafe Latte" => 150.00, "Caramel Latte" => 160.00,
                "Cinnamon" => 70.00, "Dark Mocha" => 180.00,
                "English Toffee" => 170.00, "Hazelnut Latte" => 155.00,
                "Spanish Latte" => 165.00, "Classic Chocolate" => 150.00,
                "Milky Caramel" => 145.00, "Matcha" => 140.00
            ];
            foreach ($menu_items as $item => $price) {
                echo "<div class='menu-item'><button onclick=\"addItem('$item', $price)\">$item</button></div>";
            }
            ?>
        </div>
        <div class="add-ons">
            <div class="menu-grid">
                <div class="menu-item"><button onclick="addItem('Caramel', 20.00)">Caramel</button></div>
                <div class="menu-item"><button onclick="addItem('Espresso Shot', 30.00)">Espresso Shot</button></div>
                <div class="menu-item"><button onclick="addItem('Hazelnut', 25.00)">Hazelnut</button></div>
                <div class="menu-item"><button onclick="addItem('Vanilla', 20.00)">Vanilla</button></div>
            </div>
        </div>
        <div class="primarybtns">
            <div class="menu-grid">
                <div class="menu-item"><button style="background-color: #C98F4F" onclick="toggleOption('Hot')">Hot</button></div>
                <div class="menu-item"><button style="background-color: #C98F4F" onclick="toggleOption('Iced')">Iced</button></div>
                <div class="menu-item"><button style="background-color: #65ceff" onclick="addSelected()">Add</button></div>
                <div class="menu-item"><button style="background-color: #bb0d12" onclick="removeSelected()">Remove</button></div>
                <div class="menu-item"><button style="background-color: #FA7570" onclick="clearItems()">Clear Items</button></div>
                <div class="menu-item"><button style="background-color: #ffe168" onclick="printReceipt()">Print Receipt</button></div>
            </div>
        </div>
    </div>
</div>

<!-- Include external JavaScript -->
<script src="mainposscript.js"></script>

<?php include 'footer.php'; ?>
