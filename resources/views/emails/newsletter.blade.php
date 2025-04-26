<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .header img {
            max-width: 200px;
            height: auto;
        }
        .content {
            padding: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #eee;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #20c7d9;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .btn:hover {
            background-color: #1ab5c6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo/logo.jpg') }}" alt="Muster & Dikson Logo">
        </div>
        
        <div class="content">
            {!! $emailContent !!}
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Muster & Dikson. Tous droits réservés.</p>
            <p>
                <a href="{{ route('newsletter.unsubscribe', base64_encode($email)) }}">Se désinscrire</a>
            </p>
        </div>
    </div>
</body>
</html>
