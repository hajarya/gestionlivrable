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
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-image: url('{{ asset('images/login-bg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 15px;
            overflow: hidden;
        }

        /* Overlay plus léger */
        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(102, 126, 234, 0.15) 0%, 
                rgba(118, 75, 162, 0.15) 100%);
            z-index: 0;
        }

        /* Animations de fond */
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            25% { transform: translateY(-20px) translateX(10px); }
            50% { transform: translateY(10px) translateX(-15px); }
            75% { transform: translateY(-10px) translateX(20px); }
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.2); }
        }

        /* Éléments décoratifs animés */
        .decor-1 {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            animation: float 20s ease-in-out infinite, rotate 30s linear infinite;
            z-index: 0;
        }

        .decor-2 {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(118, 75, 162, 0.1) 0%, transparent 70%);
            bottom: -50px;
            left: -50px;
            animation: float 25s ease-in-out infinite reverse, rotate 25s linear infinite;
            z-index: 0;
        }

        .decor-3 {
            position: absolute;
            width: 150px;
            height: 150px;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: 20%;
            left: 10%;
            animation: pulse 4s ease-in-out infinite, rotate 20s linear infinite;
            z-index: 0;
        }

        /* Carte d'inscription avec animations */
        .register-card {
            position: relative;
            width: 100%;
            max-width: 520px; /* Légèrement élargi pour accueillir le nouveau champ */
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 35px 35px;
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 1;
            animation: cardAppear 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
            overflow: hidden;
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
            opacity: 0.3;
            z-index: -1;
        }

        @keyframes cardAppear {
            0% {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Logo SEGULA avec animation - AGRANDI */
        .segula-logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .segula-logo {
            height: 90px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 5px 15px rgba(102, 126, 234, 0.3));
            transition: all 0.4s ease;
        }

        .segula-logo:hover {
            transform: scale(1.1) rotate(2deg);
            filter: drop-shadow(0 10px 20px rgba(102, 126, 234, 0.5));
        }

        /* Titre avec animation - EN VIOLET */
        .register-title {
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            color: #764ba2;
            margin-bottom: 5px;
            animation: titleGlow 2s ease-in-out infinite;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(118, 75, 162, 0.2);
        }

        @keyframes titleGlow {
            0%, 100% { text-shadow: 0 0 5px rgba(118, 75, 162, 0.3); }
            50% { text-shadow: 0 0 15px rgba(118, 75, 162, 0.5); }
        }

        .register-subtitle {
            text-align: center;
            color: #718096;
            font-size: 13px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-out;
        }

        /* Séparateur animé */
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #a0aec0;
            font-size: 12px;
            margin: 15px 0;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
            animation: lineExpand 1s ease-out forwards;
            transform-origin: left;
        }

        .separator::after {
            transform-origin: right;
        }

        @keyframes lineExpand {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        .separator span {
            padding: 0 10px;
            color: #667eea;
            font-weight: 500;
            animation: fadeInScale 0.5s ease-out 0.5s both;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Session Status avec animation */
        .session-status {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: slideIn 0.5s ease-out, pulseGreen 2s ease-in-out infinite;
        }

        @keyframes pulseGreen {
            0%, 100% { box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3); }
            50% { box-shadow: 0 8px 20px rgba(16, 185, 129, 0.5); }
        }

        .session-status i {
            animation: spin 3s linear infinite;
        }

        /* Grille pour les champs */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 5px;
        }

        /* Champs de formulaire avec animations */
        .form-group {
            margin-bottom: 15px;
            animation: slideInUp 0.5s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.15s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.25s; }
        .form-group:nth-child(5) { animation-delay: 0.3s; }
        .form-group:nth-child(6) { animation-delay: 0.35s; }
        .form-group:nth-child(7) { animation-delay: 0.4s; } /* Nouveau délai pour le champ rôle */

        .form-group.full-width {
            grid-column: span 2;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-label {
            display: block;
            margin-bottom: 5px;
            color: #4a5568;
            font-weight: 500;
            font-size: 13px;
        }

        .input-label i {
            color: #667eea;
            margin-right: 5px;
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
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 14px;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
            color: #2d3748;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23a0aec0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            cursor: pointer;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:focus + .input-icon,
        .form-select:focus + .input-icon {
            color: #667eea;
            transform: translateY(-50%) scale(1.1);
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #a0aec0;
            cursor: pointer;
            padding: 5px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
            transform: translateY(-50%) scale(1.2);
        }

        /* Badges pour les rôles (optionnel) */
        .role-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            margin-left: 8px;
        }

        .role-badge.responsable {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .role-badge.manager {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }

        .role-badge.consultant {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: white;
        }

        /* Checkbox conditions */
        .terms-checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #4a5568;
            font-size: 13px;
            margin: 15px 0;
            animation: fadeIn 0.5s ease-out 0.4s both;
        }

        .terms-checkbox input {
            width: 16px;
            height: 16px;
            accent-color: #667eea;
            transition: transform 0.2s ease;
        }

        .terms-checkbox input:hover {
            transform: scale(1.2);
        }

        .terms-checkbox a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .terms-checkbox a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #667eea;
            transition: width 0.3s ease;
        }

        .terms-checkbox a:hover::after {
            width: 100%;
        }

        /* Bouton d'inscription avec animations */
        .register-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            background-size: 200% 200%;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            animation: gradientShift 3s ease infinite, fadeIn 0.5s ease-out 0.5s both;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn i {
            transition: transform 0.3s ease;
        }

        .register-btn:hover i {
            transform: translateX(5px) scale(1.2);
        }

        /* Lien de connexion */
        .login-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
            animation: fadeIn 0.5s ease-out 0.6s both;
        }

        .login-section p {
            color: #718096;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .login-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            position: relative;
        }

        .login-link i {
            transition: transform 0.3s ease;
        }

        .login-link:hover {
            color: #764ba2;
            transform: scale(1.05);
        }

        .login-link:hover i {
            transform: translateX(3px);
        }

        /* Footer */
        .register-footer {
            text-align: center;
            margin-top: 20px;
            color: #a0aec0;
            font-size: 11px;
            animation: fadeIn 0.5s ease-out 0.7s both;
        }

        .register-footer i {
            color: #667eea;
            animation: heartBeat 1.5s ease-in-out infinite;
        }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.2); }
            50% { transform: scale(1); }
            75% { transform: scale(1.2); }
        }

        /* Messages d'erreur */
        .error-message {
            color: #f56565;
            font-size: 12px;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .register-card {
                padding: 25px 20px;
                max-width: 100%;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
            
            .segula-logo {
                height: 70px;
            }
            
            .register-title {
                font-size: 24px;
            }
            
            .decor-1, .decor-2, .decor-3 {
                display: none;
            }
        }
    </style>

    <div class="register-container">
        <!-- Éléments décoratifs animés -->
        <div class="decor-1"></div>
        <div class="decor-2"></div>
        <div class="decor-3"></div>

        <!-- Carte d'inscription -->
        <div class="register-card">
            <!-- Logo SEGULA agrandi -->
            <div class="segula-logo-container">
                <img src="{{ asset('images/logo-segula.png') }}" 
                     alt="SEGULA Technologies" 
                     class="segula-logo"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/200x65/667eea/ffffff?text=SEGULA';">
            </div>
            
            <!-- Titre en violet -->
            <h1 class="register-title">Créer un compte</h1>
            <p class="register-subtitle">Rejoignez Gestion Livrable</p>

            <!-- Séparateur -->
            <div class="separator">
                <span>Inscription</span>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulaire d'inscription -->
            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <!-- Grille prénom/nom -->
                <div class="form-grid">
                    <!-- Prénom -->
                    <div class="form-group">
                        <label class="input-label" for="first_name">
                            <i class="fas fa-user"></i>
                            Prénom
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input id="first_name" 
                                   class="form-input" 
                                   type="text" 
                                   name="first_name" 
                                   value="{{ old('first_name') }}" 
                                   required 
                                   autofocus 
                                   placeholder="Jean" />
                        </div>
                        @error('first_name')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Nom -->
                    <div class="form-group">
                        <label class="input-label" for="last_name">
                            <i class="fas fa-user"></i>
                            Nom
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input id="last_name" 
                                   class="form-input" 
                                   type="text" 
                                   name="last_name" 
                                   value="{{ old('last_name') }}" 
                                   required 
                                   placeholder="Dupont" />
                        </div>
                        @error('last_name')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group full-width">
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
                               placeholder="jean.dupont@email.com" />
                    </div>
                    @error('email')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- NOUVEAU CHAMP RÔLE -->
                <div class="form-group full-width">
                    <label class="input-label" for="role">
                        <i class="fas fa-briefcase"></i>
                        Rôle
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-tag input-icon"></i>
                        <select id="role" name="role" class="form-select" required>
                            <option value="" disabled selected>Choisissez votre rôle</option>
                            <option value="responsable" {{ old('role') == 'responsable' ? 'selected' : '' }}>
                                Responsable
                            </option>
                            <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>
                                Manager
                            </option>
                            <option value="consultant" {{ old('role') == 'consultant' ? 'selected' : '' }}>
                                Consultant
                            </option>
                        </select>
                    </div>
                    @error('role')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    
                    <!-- Indicateur visuel des rôles (optionnel) -->
                    <div style="display: flex; gap: 10px; margin-top: 8px; justify-content: center;">
                        <span class="role-badge responsable">Responsable</span>
                        <span class="role-badge manager">Manager</span>
                        <span class="role-badge consultant">Consultant</span>
                    </div>
                    <p style="text-align: center; font-size: 11px; color: #718096; margin-top: 5px;">
                        <i class="fas fa-info-circle"></i> Sélectionnez le rôle qui correspond à votre fonction
                    </p>
                </div>

                <!-- Grille mots de passe -->
                <div class="form-grid">
                    <!-- Mot de passe -->
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
                                   placeholder="••••••••" />
                            <button type="button" 
                                    class="password-toggle"
                                    onclick="togglePassword('password', 'toggleIcon1')">
                                <i class="fas fa-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirmation -->
                    <div class="form-group">
                        <label class="input-label" for="password_confirmation">
                            <i class="fas fa-lock"></i>
                            Confirmer
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input id="password_confirmation" 
                                   class="form-input"
                                   type="password"
                                   name="password_confirmation"
                                   required 
                                   placeholder="••••••••" />
                            <button type="button" 
                                    class="password-toggle"
                                    onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                <i class="fas fa-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Conditions d'utilisation -->
                <div class="terms-checkbox">
                    <input type="checkbox" name="terms" required>
                    <span>J'accepte les <a href="#">conditions d'utilisation</a></span>
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit" class="register-btn">
                    <i class="fas fa-user-plus"></i>
                    Créer mon compte
                </button>

                <!-- Lien de connexion -->
                <div class="login-section">
                    <p>Déjà inscrit ?</p>
                    <a href="{{ route('login') }}" class="login-link">
                        <i class="fas fa-sign-in-alt"></i>
                        Se connecter
                    </a>
                </div>
            </form>

            <!-- Footer -->
            <div class="register-footer">
                <i class="fas fa-heart"></i>
                &copy; {{ date('Y') }} Gestion Livrable
                <i class="fas fa-heart"></i>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Animation supplémentaire pour le champ rôle (optionnel)
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            if (roleSelect) {
                roleSelect.addEventListener('change', function() {
                    this.style.borderColor = '#667eea';
                    setTimeout(() => {
                        this.style.borderColor = '#e2e8f0';
                    }, 300);
                });
            }
        });
    </script>
</x-guest-layout>