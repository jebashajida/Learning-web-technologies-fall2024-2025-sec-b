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
    <title>Pricing Plans</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }


        h1 {
            color: #4CAF50;
            margin-bottom: 40px;
        }

        .pricing-plans {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .pricing-plan {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 700px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            transition: transform 0.3s ease;
        }

        .pricing-plan h2 {
            color: #4CAF50;
        }

        .pricing-plan p {
            margin: 10px 0;
            color: #555;
        }

        .pricing-plan button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .pricing-plan button:hover {
            background-color: #45a049;
        }

        .pricing-plan.free-plan {
            border: 2px solid #4CAF50;
        }

        .pricing-plan.pro-plan,
        .pricing-plan.team-plan {
            border: 2px solid #ccc;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: #333;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="header"></div>

    <div class="container">
        <h1>Our Pricing Plans</h1>

        <div class="pricing-plans">
            <div class="pricing-plan free-plan">
                <h2>Free Plan</h2>
                <p>$0/month</p>
                <p>Basic features for individual use.</p>
                <button class="select-plan" data-plan="free">Current Plan</button>
            </div>

            <div class="pricing-plan pro-plan">
                <h2>Pro Plan</h2>
                <p>$20/month</p>
                <p>Advanced features for professionals.</p>
                <button onclick="window.location.href='payment.php';">Select Plan</button>
            </div>

            <div class="pricing-plan team-plan">
                <h2>Team Plan</h2>
                <p>$50/month</p>
                <p>Collaboration tools for teams.</p>
                <button class="select-plan" data-plan="team">Select Plan</button>
            </div>
        </div>
    </div>

    <div id="plan-popup" class="popup">
        <div class="popup-content">
            <span id="close-popup" class="close-btn">&times;</span>
            <p>The plan is still in the works!</p>
        </div>
    </div>

    <div id="footer"></div>

    <script>
        function togglePopup(plan) {
            const popup = document.getElementById('plan-popup');
            const popupMessage = popup.querySelector('p');
            if (plan === "team") { 
                popupMessage.textContent = "The plan is still in the works!";
                popup.style.display = "flex";
            } else {
                popup.style.display = "none";
            }
        }

        const planButtons = document.querySelectorAll('.select-plan');
        planButtons.forEach(button => {
            button.addEventListener('click', function() {
                const selectedPlan = button.getAttribute('data-plan');
                togglePopup(selectedPlan);
            });
        });

        document.getElementById('close-popup').addEventListener('click', function() {
            document.getElementById('plan-popup').style.display = 'none';
        });

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

        window.onload = function() {
        loadHeaderFooter();
    };
    </script>
</body>

</html>