<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User list</title>
    <script type="text/javascript" src="./../../../src/Views/user/scripts/user.js"></script>
</head>
<body>
    <h1>User registration</h1>

        <label for="email">Email:</label>
        <br>
        <input placeholder='Email' id='email' name='email' type='email' />
        <br>

        <br>
        <label for="name">Name:</label>
        <br>
        <input placeholder='Name' id='name' name='name' type='text' />
        <br>

        <br>
        <label for="password">Password:</label>
        <br>
        <input placeholder='Password' id='password' name='password' type='password' />
        <br>

        <br>
        <button type='submit' onclick='register()'>
            Submit
        </button>

        <p id='message'></p>

</body>
</html>