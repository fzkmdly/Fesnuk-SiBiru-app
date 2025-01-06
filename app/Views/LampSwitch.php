<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamp Control</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #007bff;
        }
        .lamp-status {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 20px 0;
        }
        .lamp-status.on {
            color: #28a745;
        }
        .lamp-status.off {
            color: #dc3545;
        }
        .switch-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }
        .switch {
            position: relative;
            width: 60px;
            height: 30px;
            background-color: #ccc;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background-color: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }
        .switch.on {
            background-color: #28a745;
        }
        .switch.on::before {
            transform: translateX(30px);
        }
        form {
            display: none; /* Form is hidden; status toggled via JavaScript */
        }
        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lamp Control</h1>
        <div class="lamp-status <?= strtolower($status) ?>">
            Lamp is currently: <span><?= esc($status) ?></span>
        </div>
        <div class="switch-container">
            <div class="switch <?= strtolower($status) ?>" id="lamp-switch"></div>
        </div>
    </div>
    <footer>
        © <?= date('Y') ?> Lamp Control System
    </footer>

    <script>
        // Toggle switch and update the status
        const switchElement = document.getElementById('lamp-switch');
        let lampStatus = "<?= $status ?>";

        switchElement.addEventListener('click', () => {
            // Toggle status
            lampStatus = lampStatus === 'ON' ? 'OFF' : 'ON';
            updateUI();
            sendToggleRequest();
        });

        function updateUI() {
            // Update switch UI
            switchElement.classList.toggle('on', lampStatus === 'ON');
            // Update text status
            document.querySelector('.lamp-status span').textContent = lampStatus;
            document.querySelector('.lamp-status').classList.toggle('on', lampStatus === 'ON');
            document.querySelector('.lamp-status').classList.toggle('off', lampStatus === 'OFF');
        }

        function sendToggleRequest() {
            // Send a POST request to toggle the lamp
            fetch('/toggle', { method: 'POST' })
                .then(response => response.text())
                .catch(error => console.error('Error toggling lamp:', error));
        }
    </script>
</body>
</html>
