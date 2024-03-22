<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - REV</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Custom -->
    <style>
        body {
            background-color: #f0f0f0; /* Adjust the background color to match the screenshot */
            font-family: 'Arial', sans-serif;
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            width: 350px; /* Set the card width */
            border: none; /* No border */
            border-radius: 10px; /* Rounded corners for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Card shadow */
        }

        .card-header, .card-footer {
            background: none; /* No background for header/footer */
            border: none; /* No border for header/footer */
            text-align: center; /* Center the text */
        }

        .card-header h3 {
            margin: 0; /* Remove margin */
            padding: 20px; /* Padding for the title */
            font-weight: 600; /* Font weight for the title */
            color: #333; /* Color for the title */
        }

        .card-body {
            padding: 20px; /* Padding for the card body */
        }

        .form-group label {
            font-size: 14px; /* Adjust label font size */
            color: #333; /* Label color */
            margin-bottom: 5px; /* Space below the label */
        }

        .form-control {
            border: 1px solid #ced4da; /* Border for inputs */
            border-radius: 5px; /* Rounded borders for inputs */
            font-size: 14px; /* Font size for inputs */
            height: auto; /* Adjust height */
        }

        .btn-primary {
            background-color: #007bff; /* Button background color */
            border: none; /* No border */
            padding: 10px; /* Padding for the button */
            font-size: 16px; /* Font size for button text */
            border-radius: 5px; /* Rounded corners for the button */
            box-shadow: none; /* No shadow for the button */
            margin-top: 10px; /* Margin above the button */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darken button on hover */
        }

        .card-footer {
            padding: 8px 20px; /* Padding for footer */
            font-size: 14px; /* Font size for footer text */
        }

        .card-footer a {
            color: #007bff; /* Color for footer links */
            text-decoration: none; /* No underline for links */
        }

        .card-footer a:hover {
            text-decoration: underline; /* Underline on hover for links */
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h3>LOGIN TO CONTINUE</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="euphoria@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                    <small class="form-text text-right">
                        <a href="#">Forgot Password?</a>
                    </small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
            </form>
        </div>
        <div class="card-footer">
            <span>Don't have an account? <a href="{{ route('register') }}">Register</a> Here</span>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
