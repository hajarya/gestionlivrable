<x-app-layout>
    <!-- Font Awesome pour les vraies icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Animations personnalisées */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0.3); }
            50% { box-shadow: 0 0 20px 5px rgba(124, 58, 237, 0.5); }
        }
        
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes ping {
            75%, 100% { transform: scale(1.5); opacity: 0; }
        }
        
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .animate-gradient {
            background: linear-gradient(270deg, #667eea, #764ba2, #9f7aea, #667eea);
            background-size: 300% 300%;
            animation: gradient-shift 6s ease infinite;
        }
        
        .animate-slide-right {
            animation: slideInRight 0.6s ease-out forwards;
        }
        
        .animate-slide-left {
            animation: slideInLeft 0.6s ease-out forwards;
        }
        
        .animate-scale {
            animation: scaleIn 0.5s ease-out forwards;
        }
        
        .animate-bounce-slow {
            animation: bounce 2s ease-in-out infinite;
        }
        
        .animate-spin-slow {
            animation: spin-slow 3s linear infinite;
        }
        
        .animate-ping-slow {
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }
        
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        .delay-5 { animation-delay: 0.5s; }

        /* Arrière-plan image plus visible */
        .page-bg {
            position: relative;
            min-height: 100vh;
            background-image: url('{{ asset('images/background-livrable.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .page-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.05);
            z-index: 0;
        }

        .page-content {
            position: relative;
            z-index: 1;
        }
        
        /* Scrollbar personnalisée */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46a1);
        }
        
        /* Effet de ripple */
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.4);
            width: 100px;
            height: 100px;
            margin-left: -50px;
            margin-top: -50px;
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
            z-index: 10;
        }
        
        @keyframes ripple-animation {
            from {
                transform: scale(0);
                opacity: 0.5;
            }
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .group {
            position: relative;
            overflow: hidden;
        }
        
        /* Style pour les champs de formulaire */
        .form-input {
            transition: all 0.2s ease;
        }
        
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        /* Style pour l'upload de fichiers */
        .file-upload-area {
            transition: all 0.3s ease;
        }
        
        .file-upload-area:hover {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea05, #764ba205);
        }
        
        /* Tooltip personnalisé */
        [data-tooltip] {
            position: relative;
            cursor: help;
        }
        
        [data-tooltip]:before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 4px 8px;
            background: #1e293b;
            color: white;
            font-size: 0.75rem;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
            z-index: 10;
            margin-bottom: 5px;
        }
        
        [data-tooltip]:hover:before {
            opacity: 1;
            visibility: visible;
        }
        
        /* Badge de statut pour les sections */
        .section-badge {
            position: relative;
            overflow: hidden;
        }
        
        .section-badge::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, transparent, rgba(102, 126, 234, 0.1));
            border-radius: 50%;
            transform: translate(20px, -20px);
        }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-plus-circle mr-2 text-purple-600 animate-pulse"></i>
                Création de Livrable
            </h2>
            <div class="flex space-x-2">
                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold animate-pulse">
                    <i class="fas fa-pen mr-1"></i> Nouveau
                </span>
                <a href="{{ route('responsable.livrables') }}" class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-semibold hover:bg-indigo-200 transition group">
                    <i class="fas fa-arrow-left mr-1 group-hover:-translate-x-1 transition-transform"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="page-bg py-8">
        <div class="page-content">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <!-- En-tête spectaculaire -->
                <div class="relative mb-10 overflow-hidden rounded-3xl bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 p-10 animate-gradient">
                    <div class="absolute top-0 left-0 w-full h-full">
                        <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full opacity-10 animate-ping"></div>
                        <div class="absolute bottom-10 right-10 w-32 h-32 bg-white rounded-full opacity-10 animate-ping delay-1000"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-white rounded-full opacity-5 blur-3xl"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center text-white shadow-2xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                                <i class="fas fa-plus-circle text-4xl"></i>
                            </div>
                            <div>
                                <h1 class="text-5xl font-bold text-white mb-2 tracking-tight">
                                    Créer un livrable
                                </h1>
                                <div class="flex items-center gap-3 text-purple-100">
                                    <i class="fas fa-magic"></i>
                                    <p>Remplissez les informations pour créer un nouveau livrable</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex items-center gap-2">
                            <div class="flex-1 h-2 bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-white rounded-full animate-shimmer" style="width: 0%" id="progress-bar"></div>
                            </div>
                            <span class="text-white text-sm font-medium" id="progress-text">0%</span>
                        </div>
                    </div>
                </div>

                <!-- Carte principale du formulaire -->
                <div class="bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-1">
                    <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-600"></div>
                    
                    <div class="p-8">
                        <form action="{{ route('responsable.livrables.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" id="livrable-form">
                            @csrf

                            <!-- Section Informations de base -->
                            <div class="section-badge bg-gradient-to-br from-purple-50/90 to-white/90 rounded-2xl p-6 border border-purple-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-purple-200">
                                            <i class="fas fa-info-circle text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Informations de base</h3>
                                            <p class="text-sm text-gray-500">Détails principaux du livrable</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold" data-tooltip="Étape 1 sur 4">
                                        1 Étape 1/4
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2 group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-heading text-purple-500 mr-2"></i>
                                            Titre du livrable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-pen absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors"></i>
                                            <input type="text" 
                                                   name="titre" 
                                                   id="titre"
                                                   required
                                                   placeholder="Ex: Rapport d'analyse Q1 2024"
                                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition form-input bg-white/90"
                                                   oninput="updateProgress()">
                                        </div>
                                        <p class="text-xs text-gray-400 mt-2">
                                            <i class="fas fa-lightbulb text-yellow-400 mr-1"></i>
                                            Choisissez un titre clair et descriptif
                                        </p>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-tag text-purple-500 mr-2"></i>
                                            Type de livrable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                            <i class="fas fa-folder absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors"></i>
                                            <select name="type" 
                                                    id="type"
                                                    required
                                                    class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition appearance-none bg-white/90 form-input"
                                                    onchange="updateProgress()">
                                                @foreach($types as $type)
                                                    <option value="{{ $type }}">{{ $type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-user-tie text-purple-500 mr-2"></i>
                                            Consultant responsable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                            <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors"></i>
                                            <select name="consultant_id" 
                                                    id="consultant"
                                                    required
                                                    class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition appearance-none bg-white/90 form-input"
                                                    onchange="updateProgress()">
                                                @foreach($consultants as $c)
                                                    <option value="{{ $c->id }}">
                                                        {{ $c->first_name }} {{ $c->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Planning -->
                            <div class="section-badge bg-gradient-to-br from-orange-50/90 to-white/90 rounded-2xl p-6 border border-orange-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                            <i class="fas fa-calendar-alt text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Planning</h3>
                                            <p class="text-sm text-gray-500">Définissez les dates et la durée</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold" data-tooltip="Étape 2 sur 4">
                                        2 Étape 2/4
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-calendar-plus text-purple-500 mr-2"></i>
                                            Date de début <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-calendar-day absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors"></i>
                                            <input type="date" 
                                                   name="start_date" 
                                                   id="start_date"
                                                   required
                                                   value="{{ date('Y-m-d') }}"
                                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition form-input bg-white/90"
                                                   onchange="updateProgress()">
                                        </div>
                                        <p class="text-xs text-gray-400 mt-2">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Date de début du projet
                                        </p>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-hourglass-half text-purple-500 mr-2"></i>
                                            Durée (en jours) <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-clock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors"></i>
                                            <input type="number" 
                                                   name="duration" 
                                                   id="duration"
                                                   required
                                                   min="1"
                                                   value="30"
                                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition form-input bg-white/90"
                                                   onchange="updateProgress()">
                                        </div>
                                        
                                        <div class="mt-3 p-3 bg-gradient-to-r from-orange-50/90 to-white/90 rounded-xl border border-orange-200">
                                            <div class="flex items-center justify-between text-sm">
                                                <span class="text-gray-600">
                                                    <i class="far fa-calendar-check text-orange-500 mr-1"></i>
                                                    Date de fin estimée :
                                                </span>
                                                <span class="font-semibold text-orange-700" id="end-date">
                                                    {{ \Carbon\Carbon::parse(date('Y-m-d'))->addDays(30)->format('d/m/Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Tâches -->
                            <div class="section-badge bg-gradient-to-br from-green-50/90 to-white/90 rounded-2xl p-6 border border-green-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-green-200">
                                            <i class="fas fa-tasks text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Tâches associées</h3>
                                            <p class="text-sm text-gray-500">Sélectionnez les tâches à réaliser</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold" data-tooltip="Étape 3 sur 4">
                                        3 Étape 3/4
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 p-5 bg-white/85 rounded-xl border-2 border-green-100 max-h-80 overflow-y-auto custom-scrollbar">
                                    @foreach($tasks as $index => $task)
                                        <label class="group relative flex items-center p-4 bg-gradient-to-br from-gray-50/90 to-white/90 rounded-xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                            <input type="checkbox" 
                                                   name="tasks[]" 
                                                   value="{{ $task }}"
                                                   class="w-5 h-5 text-green-600 rounded border-gray-300 focus:ring-green-500 transition transform scale-100 group-hover:scale-110"
                                                   onchange="updateProgress()">
                                            <span class="ml-3 text-gray-700 group-hover:text-green-700 transition-all font-medium flex items-center">
                                                <i class="fas fa-tasks mr-2 text-gray-400 group-hover:text-green-500 group-hover:rotate-12 transition-all"></i>
                                                {{ $task }}
                                            </span>
                                            <div class="absolute top-1 right-1 w-2 h-2 bg-green-500 rounded-full opacity-0 group-has-[:checked]:opacity-100 transition-opacity animate-pulse"></div>
                                        </label>
                                    @endforeach
                                </div>
                                
                                <div class="mt-3 flex items-center justify-between">
                                    <p class="text-xs text-gray-400">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Sélectionnez une ou plusieurs tâches
                                    </p>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold" id="task-counter">
                                        0 tâche(s) sélectionnée(s)
                                    </span>
                                </div>
                            </div>

                            <!-- Section Documents -->
                            <div class="section-badge bg-gradient-to-br from-blue-50/90 to-white/90 rounded-2xl p-6 border border-blue-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                            <i class="fas fa-file-alt text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Documents</h3>
                                            <p class="text-sm text-gray-500">Téléchargez les fichiers associés</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold" data-tooltip="Étape 4 sur 4">
                                        4 Étape 4/4
                                    </span>
                                </div>
                            
                                <div class="relative">
                                    <input type="file" 
                                           name="files[]" 
                                           id="files"
                                           multiple
                                           class="hidden"
                                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.gif,.zip"
                                           onchange="updateFileList()">
                                    <label for="files" 
                                           class="file-upload-area group relative flex flex-col items-center justify-center w-full h-56 border-4 border-dashed border-gray-300 rounded-3xl cursor-pointer hover:border-blue-400 transition-all duration-500 overflow-hidden bg-white/60">
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="absolute -top-10 -right-10 w-20 h-20 bg-blue-200 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-700"></div>
                                        <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-cyan-200 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-700"></div>
                                        
                                        <div class="relative z-10 flex flex-col items-center justify-center px-6">
                                            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-200 mb-4 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                                <i class="fas fa-cloud-upload-alt text-4xl"></i>
                                            </div>
                                            <p class="mb-2 text-lg font-semibold text-gray-700 group-hover:text-blue-600 transition-colors" id="file-label">
                                                <span class="font-bold">Cliquez pour télécharger</span>
                                            </p>
                                            <p class="text-sm text-gray-500 flex items-center">
                                                <i class="fas fa-mouse-pointer mr-2 text-blue-400"></i>
                                                ou glissez-déposez vos fichiers
                                            </p>
                                            <div class="mt-3 flex flex-wrap justify-center gap-2 text-xs text-gray-400">
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">PDF</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">DOC</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">XLS</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">PPT</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">Images</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">ZIP</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                
                                <div id="file-list" class="mt-4 space-y-3 hidden">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-file text-blue-500"></i>
                                        <p class="text-sm font-medium text-gray-700">Fichiers sélectionnés :</p>
                                    </div>
                                    <div id="file-items" class="space-y-2 max-h-48 overflow-y-auto custom-scrollbar pr-2"></div>
                                </div>
                                
                                <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                                    <i class="fas fa-info-circle text-blue-400"></i>
                                    Taille maximale par fichier : 10MB. Formats acceptés : PDF, DOC, XLS, PPT, images, ZIP
                                </p>
                            </div>

                            <!-- Résumé et validation -->
                            <div class="bg-gradient-to-br from-purple-50/90 to-indigo-50/90 rounded-2xl p-6 border border-purple-200">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800">Récapitulatif</h3>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Titre:</span>
                                        <span class="font-medium text-gray-800" id="preview-titre">-</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Type:</span>
                                        <span class="font-medium text-gray-800" id="preview-type">{{ $types[0] ?? '-' }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Consultant:</span>
                                        <span class="font-medium text-gray-800" id="preview-consultant">
                                            {{ isset($consultants[0]) ? $consultants[0]->first_name . ' ' . $consultants[0]->last_name : '-' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Durée:</span>
                                        <span class="font-medium text-gray-800" id="preview-duration">30 jours</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                                <a href="{{ route('responsable.livrables') }}" 
                                   class="group relative px-8 py-4 bg-white/80 hover:bg-white text-gray-700 rounded-xl transition-all duration-300 flex items-center gap-2 overflow-hidden border border-gray-200">
                                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-gray-300/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                                    <i class="fas fa-times group-hover:rotate-90 transition-transform duration-300"></i>
                                    <span class="relative font-medium">Annuler</span>
                                </a>
                                
                                <button type="submit" 
                                        class="group relative px-10 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white rounded-xl transition-all duration-300 flex items-center gap-3 shadow-xl shadow-purple-200 hover:shadow-2xl hover:shadow-purple-300 overflow-hidden">
                                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                                    
                                    <span class="relative flex items-center gap-2">
                                        <i class="fas fa-plus-circle group-hover:scale-110 transition-transform duration-300"></i>
                                        <i class="fas fa-file-alt group-hover:scale-110 transition-transform duration-300 delay-100"></i>
                                    </span>
                                    
                                    <span class="relative font-bold text-lg">Créer le livrable</span>
                                    
                                    <span class="absolute top-0 right-0 w-20 h-full bg-white/10 transform rotate-45 translate-x-10 group-hover:translate-x-40 transition-transform duration-700"></span>
                                    <span class="absolute bottom-0 left-0 w-20 h-full bg-white/5 transform -rotate-45 -translate-x-10 group-hover:translate-x-40 transition-transform duration-700"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Conseils et astuces -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 flex-shrink-0">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Conseil</p>
                            <p class="text-xs text-gray-500">Choisissez un titre explicite pour faciliter la recherche</p>
                        </div>
                    </div>
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600 flex-shrink-0">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Tâches</p>
                            <p class="text-xs text-gray-500">Sélectionnez au moins une tâche pour le livrable</p>
                        </div>
                    </div>
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 flex-shrink-0">
                            <i class="fas fa-file"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Documents</p>
                            <p class="text-xs text-gray-500">Vous pouvez ajouter plusieurs fichiers à la fois</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateProgress() {
            const fields = [
                document.getElementById('titre')?.value,
                document.getElementById('type')?.value,
                document.getElementById('consultant')?.value,
                document.getElementById('start_date')?.value,
                document.getElementById('duration')?.value
            ];
            
            const checkboxes = document.querySelectorAll('input[name="tasks[]"]:checked');
            const files = document.getElementById('files').files.length;
            
            let filled = fields.filter(f => f && f.toString().trim() !== '').length;
            let progress = Math.min(100, Math.round((filled / 5) * 60 + (checkboxes.length > 0 ? 20 : 0) + (files > 0 ? 20 : 0)));
            
            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('progress-text').textContent = progress + '%';
            
            document.getElementById('preview-titre').textContent = document.getElementById('titre')?.value || '-';
            document.getElementById('preview-type').textContent = document.getElementById('type')?.value || '-';
            
            const consultantSelect = document.getElementById('consultant');
            const consultantText = consultantSelect.options[consultantSelect.selectedIndex]?.text || '-';
            document.getElementById('preview-consultant').textContent = consultantText;
            
            document.getElementById('preview-duration').textContent = (document.getElementById('duration')?.value || '30') + ' jours';
            
            const taskCount = checkboxes.length;
            document.getElementById('task-counter').textContent = taskCount + ' tâche(s) sélectionnée(s)';
        }
        
        function updateEndDate() {
            const startDate = document.getElementById('start_date').value;
            const duration = parseInt(document.getElementById('duration').value) || 30;
            
            if (startDate) {
                const date = new Date(startDate);
                date.setDate(date.getDate() + duration);
                
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                
                document.getElementById('end-date').textContent = `${day}/${month}/${year}`;
            }
        }
        
        function updateFileList() {
            const fileInput = document.getElementById('files');
            const fileList = document.getElementById('file-list');
            const fileItems = document.getElementById('file-items');
            const fileLabel = document.getElementById('file-label');
            const files = Array.from(fileInput.files);
            
            if (files.length > 0) {
                fileLabel.innerHTML = `<span class="font-bold text-blue-600">${files.length} fichier(s) sélectionné(s)</span>`;
                fileList.classList.remove('hidden');
                fileItems.innerHTML = '';
                
                files.forEach((file, index) => {
                    let size = file.size;
                    let formattedSize = '';
                    if (size < 1024) {
                        formattedSize = size + ' B';
                    } else if (size < 1048576) {
                        formattedSize = (size / 1024).toFixed(1) + ' KB';
                    } else {
                        formattedSize = (size / 1048576).toFixed(1) + ' MB';
                    }
                    
                    let icon = 'fa-file';
                    const ext = file.name.split('.').pop().toLowerCase();
                    const iconMap = {
                        'pdf': 'fa-file-pdf',
                        'doc': 'fa-file-word', 'docx': 'fa-file-word',
                        'xls': 'fa-file-excel', 'xlsx': 'fa-file-excel',
                        'ppt': 'fa-file-powerpoint', 'pptx': 'fa-file-powerpoint',
                        'jpg': 'fa-file-image', 'jpeg': 'fa-file-image', 'png': 'fa-file-image', 'gif': 'fa-file-image',
                        'zip': 'fa-file-archive', 'rar': 'fa-file-archive', '7z': 'fa-file-archive'
                    };
                    icon = iconMap[ext] || 'fa-file';
                    
                    const item = document.createElement('div');
                    item.className = 'flex items-center justify-between p-3 bg-white/85 rounded-xl border border-gray-200 hover:border-blue-300 transition-all group';
                    item.innerHTML = `
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white">
                                <i class="fas ${icon}"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700">${file.name}</p>
                                <p class="text-xs text-gray-400">${formattedSize}</p>
                            </div>
                        </div>
                        <button type="button" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-red-500 hover:text-white transition-all" onclick="removeFile(${index})">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    fileItems.appendChild(item);
                });
            } else {
                fileLabel.innerHTML = '<span class="font-bold">Cliquez pour télécharger</span>';
                fileList.classList.add('hidden');
            }
            updateProgress();
        }
        
        function removeFile(index) {
            const fileInput = document.getElementById('files');
            const dt = new DataTransfer();
            const files = fileInput.files;
            
            for (let i = 0; i < files.length; i++) {
                if (i !== index) {
                    dt.items.add(files[i]);
                }
            }
            
            fileInput.files = dt.files;
            updateFileList();
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('titre').addEventListener('input', updateProgress);
            document.getElementById('type').addEventListener('change', updateProgress);
            document.getElementById('consultant').addEventListener('change', updateProgress);
            document.getElementById('start_date').addEventListener('change', function() {
                updateProgress();
                updateEndDate();
            });
            document.getElementById('duration').addEventListener('input', function() {
                updateProgress();
                updateEndDate();
            });
            
            document.querySelectorAll('input[name="tasks[]"]').forEach(cb => {
                cb.addEventListener('change', updateProgress);
            });
            
            updateProgress();
            updateEndDate();
            
            const dropZone = document.querySelector('label[for="files"]');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropZone.classList.add('border-blue-500');
            }
            
            function unhighlight() {
                dropZone.classList.remove('border-blue-500');
            }
            
            dropZone.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                document.getElementById('files').files = files;
                updateFileList();
            }
            
            const buttons = document.querySelectorAll('a, button');
            buttons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    if (!this.hasAttribute('onclick') && !this.classList.contains('no-ripple')) {
                        const ripple = document.createElement('span');
                        ripple.classList.add('ripple-effect');
                        this.appendChild(ripple);
                        
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        
                        ripple.style.left = `${x}px`;
                        ripple.style.top = `${y}px`;
                        
                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    }
                });
            });
        });
    </script>
</x-app-layout>