<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bad Request | Ananta Poudyal</title>

    <meta name="description"
        content="The request could not be understood by the server.">

    <link rel="icon" type="image/png" href="{{ asset('assets/viewer/img/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            background: #f8f9fc;
            color: #1f2937;
        }

        .error-container {
            width: 100%;
            max-width: 700px;
            padding: 40px 20px;
            text-align: center;
        }

        .error-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eef0ff;
            color: #2e3485;
            font-size: 38px;
        }

        .error-code {
            font-size: 120px;
            line-height: 1;
            font-weight: 800;
            color: #2e3485;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .description {
            max-width: 520px;
            margin: 0 auto 30px;
            color: #6b7280;
            font-size: 16px;
            line-height: 1.7;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: #2e3485;
            color: #fff;
        }

        .btn-primary:hover {
            background: #252a6d;
            color: #fff;
        }

        .btn-outline {
            border: 1px solid #d1d5db;
            color: #374151;
            background: #fff;
        }

        .btn-outline:hover {
            border-color: #2e3485;
            color: #2e3485;
        }

        .footer {
            margin-top: 45px;
            color: #9ca3af;
            font-size: 13px;
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 90px;
            }

            h1 {
                font-size: 24px;
            }

            .description {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="error-container">

        <div class="error-icon">
            <i class="fas fa-triangle-exclamation"></i>
        </div>

        <div class="error-code">
            400
        </div>

        <h1>
            Bad Request
        </h1>

        <p class="description">
            The server could not understand your request.
            Please check the request and try again.
        </p>

        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i>
                Back to Home
            </a>

            <a href="javascript:history.back()" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i>
                Go Back
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Ananta Poudyal. All rights reserved.
        </div>

    </div>

</body>

</html>