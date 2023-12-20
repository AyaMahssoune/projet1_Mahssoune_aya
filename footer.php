<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <style>
        footer {
            background-color: #343a40;
            /* Couleur de fond du pied de page */
            color: #ffffff;
            /* Couleur du texte du pied de page */
            padding: 20px 0;
            text-align: left;
        }

        .footer-content {
            display: flex;
        }

        .social-media {
            flex: 1;
        }

        .social-icon {
            color: #ffffff;
            /* Couleur des icônes de médias sociaux */
            font-size: 24px;
            margin-right: 10px;
        }

        .footer-links {
            flex: 1;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #ffffff;
            /* Couleur des liens du pied de page */
            transition: color 0.3s ease;
            /* Transition de couleur pour un effet de survol */
        }

        .footer-links a:hover {
            color: #007bff;
            /* Couleur de survol des liens du pied de page */
        }

        .contact-info {
            flex: 1;
        }

        .contact-info p {
            margin: 0;
            margin-bottom: 10px;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            color: #ffffff;
            /* Couleur du texte du pied de page */
        }
    </style>
</head>

<body>
    <footer>
        <div class="footer-content">

            <!-- Social media -->
            <div class="social-media">
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>

            <!--links -->

            <div class="footer-links">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="./manageSession/signUp.php">Sign Up</a></li>
                    <li><a href="./manageSession/login.php">Login</a></li>
                    <li><a href="./manageSession/login.php">Our Shop</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="contact-info">
                <p>123 Hochelaga H1V2 E3 - Montreal, Canada</p>
                <p>Email: info@XP.ca</p>
                <p>Téléphone: +1 514 *** ***</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <p>&copy; 2023 XP. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>