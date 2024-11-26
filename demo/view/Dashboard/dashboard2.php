<?php

require(VIEWS . "Dashboard/headers.php");
require("finconfig.php")

?>
<style>


body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.earnings-panel {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 40px;
    max-width: 678px;
    margin: auto;
    text-align: center;
}

.total-earnings {
    font-size: 48px;
    font-weight: bold;
    color: #4CAF50;
    margin-bottom: 20px;
}

.total-transactions {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
}

.earning-details {
    text-align: left;
}

.earning-details h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.earning-details ul {
    list-style-type: none;
    padding: 0;
}

.earning-details li {
    padding: 5px 0;
    border-bottom: 1px solid #ddd;
}
</style>



<body>
    <div class="earnings-panel">
        <div class="total-earnings"><?php echo $price; ?></div>
        <div class="total-transactions">Total Transactions: <?php echo $count; ?></div>
        <div class="earning-details">
            <h3>Earning Details:</h3>
            <ul>
                <li><p><?php echo implode($tran1); ?></p></li>
                <li>Transaction 2: $150</li>
                <li>Transaction 3: $300</li>
                <li>Transaction 4: $400</li>
                <li>Transaction 5: $100</li>
            </ul>
        </div>
    </div>
</body>
</html>
