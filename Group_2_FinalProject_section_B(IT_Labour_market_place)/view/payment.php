<?php
session_start();
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <script>
        function loadHeaderFooter() {
            fetch('getHeader.php')
                .then(response => response.text())
                .then(data => document.getElementById('header').innerHTML = data)
                .catch(error => console.error('Error loading header:', error));

            fetch('footer.php')
                .then(response => response.text())
                .then(data => document.getElementById('footer').innerHTML = data)
                .catch(error => console.error('Error loading footer:', error));
        }
        
        function validateAndSubmitPayment(event) {
            event.preventDefault();

            const cardNumber = document.getElementById("card-number").value.trim();
            const nameOnCard = document.getElementById("name-on-card").value.trim();
            const expiry = document.getElementById("expiry").value.trim();
            const cvv = document.getElementById("cvv").value.trim();
            const billingAddress = document.getElementById("billing-address").value.trim();
            const saveInfo = document.getElementById("save-info").checked ? 1 : 0;

            if (!cardNumber || !nameOnCard || !expiry || !cvv) {
                alert("All fields are required.");
                return;
            }
            if (!/^\d{16}$/.test(cardNumber)) {
                alert("Card number must be 16 digits.");
                return;
            }
            if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiry)) {
                alert("Invalid expiry date format. Use MM/YY.");
                return;
            }
            if (!/^\d{3,4}$/.test(cvv)) {
                alert("CVV must be 3 or 4 digits.");
                return;
            }

            const paymentData = {
                card_number: cardNumber,
                name_on_card: nameOnCard,
                expiry: expiry,
                cvv: cvv,
                billing_address: billingAddress || "Same as shipping address",
                save_info: saveInfo
            };

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/checkpayment.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert("An error occurred while processing your payment.");
                    }
                }
            };

            xhr.send(JSON.stringify(paymentData));
        }

        window.onload = function() {
            loadHeaderFooter();
        };
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <div class="container">
        <h2>Checkout Page</h2>
        <form id="paymentForm" onsubmit="validateAndSubmitPayment(event)">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" required>

            <label for="name-on-card">Name on Card:</label>
            <input type="text" id="name-on-card" required>

            <label for="expiry">Expiry (MM/YY):</label>
            <input type="text" id="expiry" required>

            <label for="cvv">CVV:</label>
            <input type="password" id="cvv" required>

            <label for="billing-address">Billing Address:</label>
            <input type="text" id="billing-address">

            <button type="submit">Submit Payment</button>
            
            <label for="save-info">Save my information for later use and quick access?</label>
            <input type="checkbox" id="save-info">
        </form>        
    </div>
    <div id="footer"></div>
</body>

</html>