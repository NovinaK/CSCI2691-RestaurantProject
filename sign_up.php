<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Restaurant Login Page</title>
    <link rel="stylesheet" href="Template.css"/>
</head>
<body>
    <h1 style="height: 75px">NoVz</h1>

    <!-- Display Messages -->
    <?php
    if (isset($_GET['success'])) {
        echo "<p style='color: green; text-align: center;'>" . htmlspecialchars($_GET['success']) . "</p>";
    } elseif (isset($_GET['error'])) {
        echo "<p style='color: red; text-align: center;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>

    <form action="User page.php" method="post">
        <table align="center" style="width: 339px; height: 231px">
            <tr>
                <td style="text-align:left">User Name</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="username" placeholder="Username" required style="width: 216px; height: 27px">
                </td>
            </tr>
            <tr>
                <td style="text-align:left">Email</td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="email" placeholder="Email" required style="width: 216px; height: 27px">
                </td>
            </tr>
            <tr>
                <td style="text-align:left">Password</td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" placeholder="Password" required style="width: 216px; height: 27px">
                </td>
            </tr>
            <tr>
                <td style="text-align:left">Confirm Password</td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required style="width: 216px; height: 27px">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="login-button" style="width: 60%">Sign Up</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
