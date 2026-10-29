<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$dbName = "contacts";

$conn = new mysqli($host, $user, $pass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name, email, contact FROM my_contact ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table { border-collapse: collapse; width: 90%; margin: 20px auto; }
    th, td { border: 1px solid #333; padding: 8px 12px; text-align: left; }
    th { background-color: #f0f0f0; }
    h2, p { text-align: center; }
  </style>
</head>
<body>
  <h2>Dashboard</h2>

  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row["id"]) ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["contact"] ?? "") ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4">No contacts found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <p><a href="index.php">Back to Contact Form</a></p>
</body>
</html>
<?php $conn->close(); ?>