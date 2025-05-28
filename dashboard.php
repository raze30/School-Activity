<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

    body {
      font-family: 'Nunito', sans-serif;
      background: linear-gradient(-45deg,rgb(85, 177, 213), #203a43, #2c5364,rgb(192, 153, 153));
      background-size: 400% 400%;
      animation: darkBG 10s ease infinite;
      color: #f1f1f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    @keyframes darkBG {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    .dashboard {
      background: rgba(255, 255, 255, 0.07);
      padding: 50px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      backdrop-filter: blur(10px);
    }

    h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
      font-weight: 700;
    }

    p {
      font-size: 1.4em;
      margin-bottom: 30px;
      color: #e0e0e0;
    }

    button {
      background: linear-gradient(to right, #ff416c, #ff4b2b);
      color: white;
      border: none;
      padding: 14px 28px;
      font-size: 1.2em;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: bold;
    }

    button:hover {
      transform: scale(1.05);
      background: linear-gradient(to right, #ff4b2b, #ff416c);
      box-shadow: 0 0 15px rgba(255, 75, 43, 0.5);
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <p>You are successfully logged in.</p>
    <form method="POST" action="logout.php">
      <button type="submit">Logout</button>
    </form>
  </div>
</body>
</html>