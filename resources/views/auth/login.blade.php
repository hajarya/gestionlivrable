<x-guest-layout>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Styles personnalisés */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Conteneur principal avec image de fond */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-image: url('{{ asset('images/login-bg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
            overflow: hidden;
        }

        /* Overlay avec dégradé animé */
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(102, 126, 234, 0.2) 0%, 
                rgba(118, 75, 162, 0.2) 50%,
                rgba(102, 126, 234, 0.2) 100%);
            background-size: 300% 300%;
            animation: gradientMove 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Éléments flottants décoratifs (cercles supprimés) */
        .floating-shapes {
            display: none;
        }

        /* Particules flottantes (conservées pour le style) */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
            animation: floatParticle 15s linear infinite;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) translateX(-50px) rotate(0deg);
                opacity: 0;
            }
            20% { opacity: 0.8; }
            80% { opacity: 0.8; }
            100% {
                transform: translateY(-100vh) translateX(50px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Carte de connexion améliorée */
        .login-card {
            position: relative;
            width: 100%;
            max-width: 550px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 40px;
            padding: 50px 45px;
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.3) inset,
                0 0 40px rgba(102, 126, 234, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 1;
            animation: cardAppear 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
            transform-origin: center;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotateSlow 20s linear infinite;
            opacity: 0.5;
            z-index: -1;
        }

        .login-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 8s infinite;
            pointer-events: none;
        }

        @keyframes cardAppear {
            0% {
                opacity: 0;
                transform: scale(0.8) translateY(50px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes rotateSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes shine {
            0% { left: -100%; }
            20% { left: 100%; }
            100% { left: 100%; }
        }

        /* Logo SEGULA - AGRANDI */
        .segula-logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            position: relative;
            animation: logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .segula-logo-container::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(15px);
            animation: glowPulse 3s ease-in-out infinite;
        }

        .segula-logo {
            height: 120px; /* Augmenté de 80px à 120px */
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 15px 25px rgba(102, 126, 234, 0.4));
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
        }

        .segula-logo:hover {
            transform: scale(1.15);
            filter: drop-shadow(0 20px 35px rgba(102, 126, 234, 0.6));
        }

        @keyframes glowPulse {
            0%, 100% { opacity: 0.3; transform: translateX(-50%) scale(1); }
            50% { opacity: 0.7; transform: translateX(-50%) scale(1.3); }
        }

        /* Titre avec animation */
        .login-title {
            text-align: center;
            font-size: 34px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2, #9f7aea, #667eea);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
            animation: gradientText 6s ease infinite, titlePulse 2s ease-in-out infinite;
            letter-spacing: 1px;
        }

        @keyframes gradientText {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes titlePulse {
            0%, 100% { transform: scale(1); text-shadow: 0 0 20px rgba(102, 126, 234, 0.2); }
            50% { transform: scale(1.02); text-shadow: 0 0 30px rgba(102, 126, 234, 0.4); }
        }

        .login-subtitle {
            text-align: center;
            color: #4a5568;
            font-size: 15px;
            margin-bottom: 25px;
            font-weight: 500;
            position: relative;
            animation: fadeInUp 1s ease-out;
        }

        .login-subtitle::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
            animation: expandLine 1s ease-out forwards;
        }

        @keyframes expandLine {
            from { width: 0; }
            to { width: 50px; }
        }

        /* Séparateur amélioré */
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #4a5568;
            font-size: 13px;
            margin: 25px 0;
            font-weight: 600;
            animation: fadeIn 1s ease-out 0.2s both;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(102, 126, 234, 0.3), 
                rgba(118, 75, 162, 0.3), 
                transparent);
            animation: expandWidth 1s ease-out forwards;
        }

        .separator::before { animation-delay: 0.2s; }
        .separator::after { animation-delay: 0.4s; }

        @keyframes expandWidth {
            from { width: 0; }
            to { width: 100%; }
        }

        .separator span {
            padding: 0 15px;
            position: relative;
            animation: fadeInScale 0.5s ease-out 0.6s both;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Session Status amélioré */
        .session-status {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 15px 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.5s ease-out, pulseSuccess 2s ease-in-out infinite;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        @keyframes pulseSuccess {
            0%, 100% { box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3); }
            50% { box-shadow: 0 15px 30px rgba(16, 185, 129, 0.5); }
        }

        .session-status i {
            font-size: 20px;
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Champs de formulaire améliorés */
        .form-group {
            margin-bottom: 20px;
            animation: slideInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(1) { animation-delay: 0.3s; }
        .form-group:nth-child(2) { animation-delay: 0.4s; }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.5px;
            animation: fadeIn 0.5s ease-out;
        }

        .input-label i {
            color: #667eea;
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .input-label:hover i {
            transform: rotate(360deg);
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 2;
            transition: all 0.3s ease;
            animation: bounceIn 0.5s ease-out;
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: translateY(-50%) scale(0); }
            50% { opacity: 1; transform: translateY(-50%) scale(1.2); }
            100% { transform: translateY(-50%) scale(1); }
        }

        .form-input {
            width: 100%;
            padding: 16px 15px 16px 45px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            color: #333;
            font-weight: 500;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 
                0 10px 20px rgba(102, 126, 234, 0.2),
                0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:focus + .input-icon {
            color: #764ba2;
            transform: translateY(-50%) scale(1.1);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 5px;
            transition: all 0.3s ease;
            z-index: 2;
            animation: fadeIn 0.5s ease-out 0.5s both;
        }

        .password-toggle:hover {
            color: #667eea;
            transform: translateY(-50%) scale(1.2);
        }

        /* Options améliorées */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 20px 0;
            animation: fadeIn 0.5s ease-out 0.6s both;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #4a5568;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .remember-checkbox:hover {
            color: #667eea;
            transform: translateX(5px);
            background: rgba(102, 126, 234, 0.1);
        }

        .remember-checkbox input {
            width: 16px;
            height: 16px;
            accent-color: #667eea;
            transition: transform 0.3s ease;
        }

        .remember-checkbox:hover input {
            transform: scale(1.2);
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 5px 0;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }

        .forgot-link:hover {
            color: #764ba2;
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        /* Bouton de connexion amélioré */
        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            background-size: 200% 200%;
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            animation: gradientShift 3s ease infinite, fadeInUp 0.6s ease-out 0.7s both;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent);
            transition: left 0.5s ease;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px rgba(102, 126, 234, 0.4);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn i {
            transition: transform 0.3s ease;
        }

        .login-btn:hover i {
            transform: translateX(5px);
        }

        /* Lien d'inscription amélioré */
        .register-section {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid rgba(102, 126, 234, 0.2);
            animation: fadeIn 0.5s ease-out 0.8s both;
        }

        .register-section p {
            color: #4a5568;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .register-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 20px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            animation: bounceIn 0.8s ease-out 0.9s both;
        }

        .register-link:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.2);
            color: #764ba2;
        }

        .register-link i {
            transition: transform 0.3s ease;
        }

        .register-link:hover i {
            transform: rotate(360deg);
        }

        /* Footer amélioré */
        .login-footer {
            text-align: center;
            margin-top: 30px;
            color: #4a5568;
            font-size: 12px;
            animation: fadeIn 0.5s ease-out 1s both;
        }

        .login-footer i {
            color: #667eea;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Messages d'erreur */
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
            animation: shake 0.3s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Animations de base */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                padding: 30px 20px;
            }
            
            .segula-logo {
                height: 90px; /* Réduit sur mobile mais toujours plus grand */
            }
            
            .login-title {
                font-size: 28px;
            }
        }
    </style>

    <div class="login-container">
        <!-- Éléments flottants décoratifs (supprimés) -->

        <!-- Particules flottantes (conservées) -->
        <div class="particles" id="particles"></div>

        <!-- Carte de connexion -->
        <div class="login-card">
            <!-- En-tête avec logo SEGULA agrandi -->
            <div class="login-header">
                <div class="segula-logo-container">
                    <img src="{{ asset('images/logo-segula.png') }}" 
                         alt="SEGULA Technologies" 
                         class="segula-logo"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/300x120/667eea/ffffff?text=SEGULA';">
                </div>
                
                <h1 class="login-title">Gestion Livrable</h1>
                <p class="login-subtitle">Plateforme de gestion de livrables</p>
            </div>

            <!-- Séparateur -->
            <div class="separator">
                <span>Connexion sécurisée</span>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulaire -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label class="input-label" for="email">
                        <i class="fas fa-envelope"></i>
                        Adresse email
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" 
                               class="form-input" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="votre@email.com" />
                    </div>
                    @error('email')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="input-label" for="password">
                        <i class="fas fa-lock"></i>
                        Mot de passe
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" 
                               class="form-input"
                               type="password"
                               name="password"
                               required 
                               autocomplete="current-password"
                               placeholder="••••••••" />
                        <button type="button" 
                                class="password-toggle"
                                onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <label for="remember_me" class="remember-checkbox">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>

                <!-- Register Link -->
                <div class="register-section">
                    <p>Pas encore de compte ?</p>
                    <a href="{{ route('register') }}" class="register-link">
                        <i class="fas fa-user-plus"></i>
                        Créer un compte
                    </a>
                </div>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <i class="fas fa-heart"></i>
                &copy; {{ date('Y') }} Gestion Livrable
                <i class="fas fa-heart"></i>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour afficher/masquer le mot de passe
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Création des particules
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Position aléatoire
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                
                // Taille aléatoire
                const size = Math.random() * 4 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                
                // Opacité aléatoire
                particle.style.opacity = Math.random() * 0.5 + 0.2;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Lancer la création des particules au chargement
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
        });
    </script>
</x-guest-layout>