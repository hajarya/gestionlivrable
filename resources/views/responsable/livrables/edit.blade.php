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

        /* Background image visible */
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

        .form-input {
            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .file-upload-area {
            transition: all 0.3s ease;
        }

        .file-upload-area:hover {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea05, #764ba205);
        }

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

        .status-card input:checked + div {
            border-color: #667eea !important;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08), rgba(118, 75, 162, 0.08));
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.12);
        }

        .status-card input:checked + div .status-check {
            opacity: 1;
        }
    </style>

    @php
        $selectedTasks = json_decode($livrable->tasks, true) ?? [];
    @endphp

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-pen-to-square mr-2 text-purple-600 animate-pulse"></i>
                Modification de Livrable
            </h2>
            <div class="flex space-x-2">
                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold animate-pulse">
                    <i class="fas fa-edit mr-1"></i> Modifier
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
                <!-- En-tête -->
                <div class="relative mb-10 overflow-hidden rounded-3xl bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 p-10 animate-gradient">
                    <div class="absolute top-0 left-0 w-full h-full">
                        <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full opacity-10 animate-ping"></div>
                        <div class="absolute bottom-10 right-10 w-32 h-32 bg-white rounded-full opacity-10 animate-ping delay-1000"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-white rounded-full opacity-5 blur-3xl"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center text-white shadow-2xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                                <i class="fas fa-pen-to-square text-4xl"></i>
                            </div>
                            <div>
                                <h1 class="text-5xl font-bold text-white mb-2 tracking-tight">
                                    Modifier un livrable
                                </h1>
                                <div class="flex items-center gap-3 text-purple-100">
                                    <i class="fas fa-wand-magic-sparkles"></i>
                                    <p>Mettez à jour les informations de votre livrable</p>
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

                <!-- Formulaire -->
                <div class="bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-1">
                    <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-600"></div>

                    <div class="p-8">
                        <form action="{{ route('responsable.livrables.update', $livrable->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8" id="livrable-form">
                            @csrf
                            @method('PUT')

                            <!-- Infos de base -->
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
                                    <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold" data-tooltip="Étape 1 sur 5">
                                        Étape 1/5
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-tag text-purple-500 mr-2"></i>
                                            Type de livrable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                            <i class="fas fa-folder absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                            <select name="type"
                                                    id="type"
                                                    required
                                                    class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition appearance-none bg-white/90 form-input"
                                                    onchange="updateProgress()">
                                                @foreach($types as $type)
                                                    <option value="{{ $type }}" {{ $livrable->type == $type ? 'selected' : '' }}>
                                                        {{ $type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('type')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-user-tie text-purple-500 mr-2"></i>
                                            Consultant responsable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                            <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                            <select name="consultant_id"
                                                    id="consultant"
                                                    required
                                                    class="w-full pl-12 pr-10 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition appearance-none bg-white/90 form-input"
                                                    onchange="updateProgress()">
                                                @foreach($consultants as $consultant)
                                                    <option value="{{ $consultant->id }}" {{ $livrable->consultant_id == $consultant->id ? 'selected' : '' }}>
                                                        {{ $consultant->first_name }} {{ $consultant->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('consultant_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Statut -->
                            <div class="section-badge bg-gradient-to-br from-blue-50/90 to-white/90 rounded-2xl p-6 border border-blue-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                            <i class="fas fa-signal text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Statut</h3>
                                            <p class="text-sm text-gray-500">Choisissez l’état actuel du livrable</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold" data-tooltip="Étape 2 sur 5">
                                        Étape 2/5
                                    </span>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                                    @php
                                        $statuses = [
                                            ['value' => 'Not Started', 'label' => 'Not start', 'icon' => 'fa-circle', 'color' => 'text-gray-600', 'bg' => 'bg-gray-100'],
                                            ['value' => 'In progress', 'label' => 'In progress', 'icon' => 'fa-spinner', 'color' => 'text-blue-600', 'bg' => 'bg-blue-100'],
                                            ['value' => 'FQ review', 'label' => 'FQ review', 'icon' => 'fa-clipboard-check', 'color' => 'text-purple-600', 'bg' => 'bg-purple-100'],
                                            ['value' => 'Completed', 'label' => 'Completed', 'icon' => 'fa-check-circle', 'color' => 'text-green-600', 'bg' => 'bg-green-100'],
                                            ['value' => 'Standby', 'label' => 'Standby', 'icon' => 'fa-pause-circle', 'color' => 'text-orange-600', 'bg' => 'bg-orange-100'],
                                            ['value' => 'Cancelled', 'label' => 'Cancelled', 'icon' => 'fa-times-circle', 'color' => 'text-red-600', 'bg' => 'bg-red-100'],
                                        ];
                                    @endphp

                                    @foreach($statuses as $status)
                                        <label class="status-card cursor-pointer">
                                            <input type="radio"
                                                   name="status"
                                                   value="{{ $status['value'] }}"
                                                   class="hidden"
                                                   onchange="updateProgress()"
                                                   {{ $livrable->status == $status['value'] ? 'checked' : '' }}>
                                            <div class="relative flex flex-col items-center justify-center p-4 rounded-2xl border-2 border-gray-200 bg-white/90 hover:border-indigo-400 transition-all duration-300 min-h-[140px]">
                                                <span class="status-check absolute top-2 right-2 opacity-0 transition-opacity w-6 h-6 rounded-full bg-indigo-500 text-white flex items-center justify-center text-xs">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <div class="w-14 h-14 {{ $status['bg'] }} rounded-2xl flex items-center justify-center mb-3 {{ $status['color'] }}">
                                                    <i class="fas {{ $status['icon'] }} text-2xl {{ $status['value'] == 'In progress' ? 'animate-spin-slow' : '' }}"></i>
                                                </div>
                                                <span class="text-sm font-semibold text-gray-700 text-center">
                                                    {{ $status['label'] }}
                                                </span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                @error('status')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Planning -->
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
                                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold" data-tooltip="Étape 3 sur 5">
                                        Étape 3/5
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-calendar-plus text-purple-500 mr-2"></i>
                                            Date de début <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-calendar-day absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                            <input type="date"
                                                   name="start_date"
                                                   id="start_date"
                                                   required
                                                   value="{{ $livrable->start_date }}"
                                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition form-input bg-white/90"
                                                   onchange="updateProgress(); updateEndDate();">
                                        </div>
                                        @error('start_date')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-hourglass-half text-purple-500 mr-2"></i>
                                            Durée (en jours) <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <i class="fas fa-clock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                            <input type="number"
                                                   name="duration"
                                                   id="duration"
                                                   required
                                                   min="1"
                                                   max="365"
                                                   value="{{ $livrable->duration }}"
                                                   class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition form-input bg-white/90"
                                                   oninput="updateProgress(); updateEndDate();">
                                        </div>

                                        <div class="mt-3 p-3 bg-gradient-to-r from-orange-50/90 to-white/90 rounded-xl border border-orange-200">
                                            <div class="flex items-center justify-between text-sm">
                                                <span class="text-gray-600">
                                                    <i class="far fa-calendar-check text-orange-500 mr-1"></i>
                                                    Date de fin estimée :
                                                </span>
                                                <span class="font-semibold text-orange-700" id="end-date">-</span>
                                            </div>
                                        </div>

                                        @error('duration')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tâches -->
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
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold" data-tooltip="Étape 4 sur 5">
                                        Étape 4/5
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 p-5 bg-white/85 rounded-xl border-2 border-green-100 max-h-80 overflow-y-auto custom-scrollbar">
                                    @foreach($tasks as $task)
                                        <label class="group relative flex items-center p-4 bg-gradient-to-br from-gray-50/90 to-white/90 rounded-xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                            <input type="checkbox"
                                                   name="tasks[]"
                                                   value="{{ $task }}"
                                                   class="w-5 h-5 text-green-600 rounded border-gray-300 focus:ring-green-500 transition transform scale-100 group-hover:scale-110"
                                                   onchange="updateProgress()"
                                                   {{ in_array($task, $selectedTasks) ? 'checked' : '' }}>
                                            <span class="ml-3 text-gray-700 group-hover:text-green-700 transition-all font-medium flex items-center">
                                                <i class="fas fa-tasks mr-2 text-gray-400 group-hover:text-green-500 group-hover:rotate-12 transition-all"></i>
                                                {{ $task }}
                                            </span>
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

                                @error('tasks')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Documents -->
                            <div class="section-badge bg-gradient-to-br from-blue-50/90 to-white/90 rounded-2xl p-6 border border-blue-100">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                            <i class="fas fa-file-alt text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Document</h3>
                                            <p class="text-sm text-gray-500">Remplacez ou conservez le fichier actuel</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold" data-tooltip="Étape 5 sur 5">
                                        Étape 5/5
                                    </span>
                                </div>

                                @if($livrable->document_path)
                                    <div class="mb-6 p-4 bg-white/80 rounded-2xl border border-blue-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center text-white">
                                                <i class="fas fa-file text-2xl"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800">Document actuel</p>
                                                <p class="text-sm text-gray-500">{{ basename($livrable->document_path) }}</p>
                                            </div>
                                        </div>

                                        <a href="{{ asset('storage/' . $livrable->document_path) }}"
                                           target="_blank"
                                           class="px-5 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 transition flex items-center gap-2 w-fit">
                                            <i class="fas fa-download"></i>
                                            Télécharger
                                        </a>
                                    </div>
                                @endif

                                <div class="relative">
                                    <input type="file"
                                           name="document"
                                           id="document"
                                           class="hidden"
                                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                           onchange="updateFileList()">

                                    <label for="document"
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
                                                ou glissez-déposez votre fichier
                                            </p>
                                            <div class="mt-3 flex flex-wrap justify-center gap-2 text-xs text-gray-400">
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">PDF</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">DOC</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">XLS</span>
                                                <span class="px-3 py-1 bg-gray-100 rounded-full">PPT</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div id="file-list" class="mt-4 hidden">
                                    <div class="p-3 bg-white/85 rounded-xl border border-gray-200 flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white">
                                            <i class="fas fa-file"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700" id="file-name-preview">Nouveau fichier</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                                    <i class="fas fa-info-circle text-blue-400"></i>
                                    Laissez vide pour conserver le document actuel
                                </p>

                                @error('document')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Récapitulatif -->
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
                                        <span class="text-gray-600">Type:</span>
                                        <span class="font-medium text-gray-800" id="preview-type">{{ $livrable->type }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Consultant:</span>
                                        <span class="font-medium text-gray-800" id="preview-consultant">
                                            {{ $livrable->consultant->first_name ?? '' }} {{ $livrable->consultant->last_name ?? '' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Statut:</span>
                                        <span class="font-medium text-gray-800" id="preview-status">{{ $livrable->status }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <i class="fas fa-circle-check text-green-500"></i>
                                        <span class="text-gray-600">Durée:</span>
                                        <span class="font-medium text-gray-800" id="preview-duration">{{ $livrable->duration }} jours</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Boutons -->
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
                                        <i class="fas fa-save group-hover:scale-110 transition-transform duration-300"></i>
                                        <i class="fas fa-pen group-hover:scale-110 transition-transform duration-300 delay-100"></i>
                                    </span>

                                    <span class="relative font-bold text-lg">Enregistrer les modifications</span>

                                    <span class="absolute top-0 right-0 w-20 h-full bg-white/10 transform rotate-45 translate-x-10 group-hover:translate-x-40 transition-transform duration-700"></span>
                                    <span class="absolute bottom-0 left-0 w-20 h-full bg-white/5 transform -rotate-45 -translate-x-10 group-hover:translate-x-40 transition-transform duration-700"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Conseils -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 flex-shrink-0">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Conseil</p>
                            <p class="text-xs text-gray-500">Mets à jour les données pour garder un suivi clair</p>
                        </div>
                    </div>

                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600 flex-shrink-0">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Tâches</p>
                            <p class="text-xs text-gray-500">Vérifie les tâches cochées avant validation</p>
                        </div>
                    </div>

                    <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 flex-shrink-0">
                            <i class="fas fa-file"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Document</p>
                            <p class="text-xs text-gray-500">Tu peux garder l’ancien fichier ou le remplacer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateProgress() {
            const fields = [
                document.getElementById('type')?.value,
                document.getElementById('consultant')?.value,
                document.querySelector('input[name="status"]:checked')?.value,
                document.getElementById('start_date')?.value,
                document.getElementById('duration')?.value
            ];

            const checkboxes = document.querySelectorAll('input[name="tasks[]"]:checked');
            const file = document.getElementById('document')?.files.length || 0;

            let filled = fields.filter(f => f && f.toString().trim() !== '').length;
            let progress = Math.min(100, Math.round((filled / 5) * 70 + (checkboxes.length > 0 ? 20 : 0) + (file > 0 ? 10 : 0)));

            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('progress-text').textContent = progress + '%';

            document.getElementById('preview-type').textContent = document.getElementById('type')?.value || '-';

            const consultantSelect = document.getElementById('consultant');
            const consultantText = consultantSelect.options[consultantSelect.selectedIndex]?.text || '-';
            document.getElementById('preview-consultant').textContent = consultantText;

            const selectedStatus = document.querySelector('input[name="status"]:checked')?.value || '-';
            document.getElementById('preview-status').textContent = selectedStatus;

            document.getElementById('preview-duration').textContent = (document.getElementById('duration')?.value || '0') + ' jours';

            const taskCount = checkboxes.length;
            document.getElementById('task-counter').textContent = taskCount + ' tâche(s) sélectionnée(s)';
        }

        function updateEndDate() {
            const startDate = document.getElementById('start_date').value;
            const duration = parseInt(document.getElementById('duration').value) || 0;

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
            const fileInput = document.getElementById('document');
            const fileList = document.getElementById('file-list');
            const fileLabel = document.getElementById('file-label');
            const fileNamePreview = document.getElementById('file-name-preview');
            const file = fileInput.files[0];

            if (file) {
                fileLabel.innerHTML = `<span class="font-bold text-blue-600">1 fichier sélectionné</span>`;
                fileNamePreview.textContent = file.name;
                fileList.classList.remove('hidden');
            } else {
                fileLabel.innerHTML = '<span class="font-bold">Cliquez pour télécharger</span>';
                fileList.classList.add('hidden');
            }

            updateProgress();
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateProgress();
            updateEndDate();

            const dropZone = document.querySelector('label[for="document"]');

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
                document.getElementById('document').files = files;
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