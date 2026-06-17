<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="border w-25 p-1 mx-auto mt-2">
            <form method = "POST" action="../Controller/login_controller.php">
                <label for="username_input" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username_input" placeholder="Username">
                <label for="password_input" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password_input" placeholder="Password">
                <button type="submit" class="btn btn-primary mt-2">Log In</button>
            </form>
        </div>
    </body>
</html>