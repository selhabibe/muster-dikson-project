<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée | Muster & Dikson</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        
        .error-container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
        }
        
        .error-number {
            font-size: 6rem;
            font-weight: 700;
            color: #20c7d9;
            margin-bottom: 1rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .error-title {
            font-size: 2rem;
            font-weight: 600;
            color: #1A2A3A;
            margin-bottom: 1rem;
        }
        
        .error-description {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #20c7d9;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }
        
        .btn:hover {
            background-color: #1ab5c6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(32, 199, 217, 0.3);
        }
        
        .btn-outline {
            background-color: transparent;
            color: #20c7d9;
            border: 2px solid #20c7d9;
        }
        
        .btn-outline:hover {
            background-color: #20c7d9;
            color: white;
        }
        
        @media (max-width: 768px) {
            .error-number {
                font-size: 4rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-description {
                font-size: 1rem;
                padding: 0 1rem;
            }
            
            .btn {
                display: block;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-number">404</div>
        <h1 class="error-title">Oups ! Page non trouvée</h1>
        <p class="error-description">
            La page que vous recherchez semble avoir été déplacée, supprimée ou n'existe pas. 
            Mais ne vous inquiétez pas, nous pouvons vous aider à trouver ce que vous cherchez !
        </p>
        <div class="error-actions">
            <a href="/" class="btn">Retour à l'accueil</a>
            <a href="/nos-marques" class="btn btn-outline">Nos marques</a>
        </div>
    </div>
</body>
</html>
