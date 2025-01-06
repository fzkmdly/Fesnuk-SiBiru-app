<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamp Control</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
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
            background-image: url('/img/Oleng.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
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
        .switch-btn {
            padding: 12px 25px;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .switch-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .icon {
            font-size: 4rem;
            margin: 20px 0;
        }
        .icon.on {
            color: #ffc107;
        }
        .icon.off {
            color: #6c757d;
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
        <div class="icon <?= $status === 'ON' ? 'on' : 'off' ?>">
            <?= $status === 'ON' ? '💡' : '🔌' ?>
        </div>
        <div class="lamp-status <?= strtolower($status) ?>">
            Lamp is currently: <?= esc($status) ?>
        </div>
        <form action="/toggle" method="post">
            <button type="submit" class="switch-btn">
                <?= $status === 'ON' ? 'Turn OFF' : 'Turn ON' ?>
            </button>
        </form>
    </div>
    <footer>
        © <?= date('Y') ?> Lamp Control System
    </footer>
</body>
</html>
