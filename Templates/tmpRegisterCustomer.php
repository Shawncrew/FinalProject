<h3>Register Below</h3>

<form action="/Project4/Customer/register" method="POST">
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" />
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" />
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="text" name="password" />
        </tr>
    </table>
    <?php if(isset($msg) && !empty($msg)): ?>
    <div class="error-message"><?php echo $msg; ?></div>
    <?php endif; ?>
    <input type="submit" />
</form>