<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<form action="submit.php" method="POST">
  <h2>Contact Form</h2>

  <label for="name">Name</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" required>

  <label for="phone">Phone Number</label>
  <input type="tel" id="phone" name="phone"
         pattern="[0-9+ ]{9,15}"
         title="Enter a valid phone number (digits, optional + at the start)"
         placeholder="e.g. +237 6XX XXX XXX" required>

  <button type="submit">Submit</button>
</form>
