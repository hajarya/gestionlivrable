<x-app-layout>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
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
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
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

        @keyframes ripple-animation {
            from { transform: scale(0); opacity: 0.5; }
            to { transform: scale(4); opacity: 0; }
        }

        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-gradient {
            background: linear-gradient(270deg, #667eea, #764ba2, #9f7aea, #667eea);
            background-size: 300% 300%;
            animation: gradient-shift 6s ease infinite;
        }
        .animate-slide-right { animation: slideInRight 0.6s ease-out forwards; }
        .animate-slide-left { animation: slideInLeft 0.6s ease-out forwards; }
        .animate-scale { animation: scaleIn 0.5s ease-out forwards; }
        .animate-bounce-slow { animation: bounce 2s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 3s linear infinite; }
        .animate-ping-slow { animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite; }
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

        .group {
            position: relative;
            overflow: hidden;
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
    </style>

    @php
        $decodedTasks = json_decode($livrable->tasks, true);
        $tasksList = is_array($decodedTasks) ? $decodedTasks : [];

        $statusConfig = [
            'Not start'   => ['label' => 'Not start',   'bg' => 'bg-gray-100',   'text' => 'text-gray-600',   'icon' => 'fa-circle',          'badge' => 'bg-gray-100 text-gray-700'],
            'Not Started' => ['label' => 'Not Started', 'bg' => 'bg-gray-100',   'text' => 'text-gray-600',   'icon' => 'fa-circle',          'badge' => 'bg-gray-100 text-gray-700'],
            'In progress' => ['label' => 'In progress', 'bg' => 'bg-blue-100',   'text' => 'text-blue-600',   'icon' => 'fa-spinner',         'badge' => 'bg-blue-100 text-blue-700'],
            'FQ review'   => ['label' => 'FQ review',   'bg' => 'bg-purple-100', 'text' => 'text-purple-600', 'icon' => 'fa-clipboard-check', 'badge' => 'bg-purple-100 text-purple-700'],
            'Completed'   => ['label' => 'Completed',   'bg' => 'bg-green-100',  'text' => 'text-green-600',  'icon' => 'fa-check-circle',    'badge' => 'bg-green-100 text-green-700'],
            'Standby'     => ['label' => 'Standby',     'bg' => 'bg-orange-100', 'text' => 'text-orange-600', 'icon' => 'fa-pause-circle',    'badge' => 'bg-orange-100 text-orange-700'],
            'Cancelled'   => ['label' => 'Cancelled',   'bg' => 'bg-red-100',    'text' => 'text-red-600',    'icon' => 'fa-times-circle',    'badge' => 'bg-red-100 text-red-700'],
        ];

        $currentStatus = $statusConfig[$livrable->status] ?? ['label' => $livrable->status, 'bg' => 'bg-gray-100', 'text' => 'text-gray-600', 'icon' => 'fa-circle', 'badge' => 'bg-gray-100 text-gray-700'];

        $hasFiles = false;
        $files = [];

        if (isset($livrable->files) && $livrable->files instanceof \Illuminate\Support\Collection && $livrable->files->count() > 0) {
            $hasFiles = true;
            $files = $livrable->files;
        } elseif (!empty($livrable->document_path)) {
            $hasFiles = true;
            $files = [
                (object)[
                    'file_path' => $livrable->document_path,
                    'created_at' => $livrable->created_at,
                    'file_size' => $livrable->file_size ?? null,
                    'file_type' => $livrable->file_type ?? null
                ]
            ];
        } elseif (!empty($livrable->document)) {
            $hasFiles = true;
            $files = [
                (object)[
                    'file_path' => $livrable->document,
                    'created_at' => $livrable->created_at,
                    'file_size' => $livrable->file_size ?? null,
                    'file_type' => $livrable->file_type ?? null
                ]
            ];
        }

        $consultantName =
            trim(($livrable->consultant->first_name ?? '') . ' ' . ($livrable->consultant->last_name ?? ''))
            ?: ($livrable->consultant->name ?? 'Non assigné');
    @endphp

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-eye mr-2 text-purple-600 animate-pulse"></i>
                Détails du Livrable
            </h2>
            <div class="flex space-x-2">
                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold animate-pulse">
                    <i class="fas fa-info-circle mr-1"></i> Consultation
                </span>
                <a href="{{ route('responsable.livrables.edit', $livrable->id) }}" class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-semibold hover:bg-indigo-200 transition group">
                    <i class="fas fa-edit mr-1"></i> Modifier
                </a>
            </div>
        </div>
    </x-slot>

    <div class="page-bg py-8">
        <div class="page-content">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <!-- En-tête spectaculaire -->
                <div class="relative mb-10 overflow-hidden rounded-3xl bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 p-10 animate-gradient">
                    <div class="absolute top-0 left-0 w-full h-full">
                        <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full opacity-10 animate-ping"></div>
                        <div class="absolute bottom-10 right-10 w-32 h-32 bg-white rounded-full opacity-10 animate-ping delay-1000"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transform w-40 h-40 bg-white rounded-full opacity-5 blur-3xl"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <div class="w-20 h-20 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center text-white shadow-2xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                                    <i class="fas fa-file-alt text-4xl"></i>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-2 tracking-tight">
                                        {{ $livrable->titre }}
                                    </h1>
                                    <div class="flex items-center gap-3 text-purple-100">
                                        <i class="fas fa-circle-info"></i>
                                        <p>Consultez toutes les informations du livrable</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('responsable.livrables.edit', $livrable->id) }}" class="group relative inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-lg rounded-2xl text-white hover:bg-white/30 transition-all duration-300 overflow-hidden">
                                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                                    <i class="fas fa-edit mr-2 group-hover:scale-110 transition-transform"></i>
                                    <span class="relative">Modifier</span>
                                </a>

                                <a href="{{ route('responsable.livrables') }}" class="group relative inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-lg rounded-2xl text-white hover:bg-white/30 transition-all duration-300 overflow-hidden">
                                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                                    <span class="relative">Retour</span>
                                </a>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-2">
                            <div class="flex-1 h-2 bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-white rounded-full animate-shimmer" style="width: 100%"></div>
                            </div>
                            <span class="text-white text-sm font-medium">100%</span>
                        </div>
                    </div>
                </div>

                <!-- Grille principale -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Colonne gauche -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Informations de base -->
                        <div class="section-badge bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-1">
                            <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-600"></div>

                            <div class="p-8">
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
                                    <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold" data-tooltip="Identifiant du livrable">
                                        #LIV-{{ str_pad($livrable->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-gradient-to-br from-purple-50/90 to-white/90 rounded-2xl p-6 border border-purple-100">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600">
                                                <i class="fas fa-heading"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500">Titre</span>
                                        </div>
                                        <p class="text-lg font-bold text-gray-800">{{ $livrable->titre }}</p>
                                    </div>

                                    <div class="bg-gradient-to-br from-blue-50/90 to-white/90 rounded-2xl p-6 border border-blue-100">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                                                <i class="fas fa-tag"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500">Type</span>
                                        </div>
                                        <p class="text-lg font-bold text-gray-800">{{ $livrable->type }}</p>
                                    </div>

                                    <div class="bg-gradient-to-br from-green-50/90 to-white/90 rounded-2xl p-6 border border-green-100">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500">Consultant</span>
                                        </div>
                                        <p class="text-lg font-bold text-gray-800">{{ $consultantName }}</p>
                                        @if($livrable->consultant && !empty($livrable->consultant->email))
                                            <p class="text-xs text-gray-400 mt-1">
                                                <i class="far fa-envelope mr-1"></i>
                                                {{ $livrable->consultant->email }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="bg-gradient-to-br from-orange-50/90 to-white/90 rounded-2xl p-6 border border-orange-100">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600">
                                                <i class="fas fa-hourglass-half"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500">Durée</span>
                                        </div>
                                        <p class="text-lg font-bold text-gray-800">{{ $livrable->duration }} jours</p>
                                        <p class="text-xs text-gray-400 mt-1">
                                            <i class="far fa-calendar-check mr-1"></i>
                                            Fin prévue : {{ \Carbon\Carbon::parse($livrable->start_date)->addDays($livrable->duration)->format('d/m/Y') }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-2 bg-gradient-to-br from-gray-50/90 to-white/90 rounded-2xl p-6 border border-gray-200">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div class="w-10 h-10 {{ $currentStatus['bg'] }} rounded-xl flex items-center justify-center {{ $currentStatus['text'] }}">
                                                        <i class="fas {{ $currentStatus['icon'] }} {{ $livrable->status === 'In progress' ? 'animate-spin-slow' : '' }}"></i>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-500">Statut</span>
                                                </div>
                                                <span class="inline-flex px-4 py-2 rounded-xl text-sm font-semibold {{ $currentStatus['badge'] }}">
                                                    {{ $currentStatus['label'] }}
                                                </span>
                                            </div>

                                            <div>
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-500">Date de début</span>
                                                </div>
                                                <p class="text-lg font-bold text-gray-800">{{ \Carbon\Carbon::parse($livrable->start_date)->format('d/m/Y') }}</p>
                                                <p class="text-xs text-gray-400 mt-1">{{ \Carbon\Carbon::parse($livrable->start_date)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tâches -->
                        <div class="section-badge bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-2">
                            <div class="h-2 bg-gradient-to-r from-green-500 to-teal-500"></div>

                            <div class="p-8">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-green-200">
                                            <i class="fas fa-tasks text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Tâches associées</h3>
                                            <p class="text-sm text-gray-500">Liste des tâches du livrable</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                        {{ count($tasksList) }} tâche(s)
                                    </span>
                                </div>

                                @if(count($tasksList) > 0)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 p-5 bg-white/85 rounded-xl border-2 border-green-100 max-h-80 overflow-y-auto custom-scrollbar">
                                        @foreach($tasksList as $index => $task)
                                            <div class="group relative flex items-center p-4 bg-gradient-to-br from-gray-50/90 to-white/90 rounded-xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                                <div class="w-5 h-5 bg-green-500 rounded border border-gray-300 flex items-center justify-center text-white">
                                                    <i class="fas fa-check text-[10px]"></i>
                                                </div>
                                                <span class="ml-3 text-gray-700 group-hover:text-green-700 transition-all font-medium flex items-center">
                                                    <i class="fas fa-tasks mr-2 text-gray-400 group-hover:text-green-500 group-hover:rotate-12 transition-all"></i>
                                                    {{ is_array($task) ? ($task['nom'] ?? 'Tâche sans nom') : $task }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-10 bg-white/85 rounded-2xl border border-green-100">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-tasks text-3xl text-gray-400"></i>
                                        </div>
                                        <p class="text-gray-500 mb-2">Aucune tâche associée</p>
                                        <p class="text-xs text-gray-400">Ce livrable n'a pas encore de tâches définies</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Documents -->
                        <div class="section-badge bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-3">
                            <div class="h-2 bg-gradient-to-r from-blue-500 to-cyan-500"></div>

                            <div class="p-8">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                            <i class="fas fa-file-alt text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">Documents</h3>
                                            <p class="text-sm text-gray-500">Fichiers associés au livrable</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                        {{ $hasFiles ? count($files) : 0 }} fichier(s)
                                    </span>
                                </div>

                                @if($hasFiles)
                                    <div class="grid grid-cols-1 gap-4 max-h-96 overflow-y-auto custom-scrollbar pr-2">
                                        @foreach($files as $index => $file)
                                            @php
                                                $filePath = '';
                                                $fileSize = null;
                                                $fileCreatedAt = null;

                                                if (is_object($file)) {
                                                    $filePath = $file->file_path ?? $file->path ?? $file->filename ?? '';
                                                    $fileSize = $file->file_size ?? null;
                                                    $fileCreatedAt = $file->created_at ?? null;
                                                } elseif (is_string($file)) {
                                                    $filePath = $file;
                                                }

                                                $fileUrl = asset('storage/' . $filePath);
                                                $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                                $fileName = basename($filePath);
                                                $fileNameShort = strlen($fileName) > 35 ? substr($fileName, 0, 32) . '...' : $fileName;

                                                $iconClass = 'fa-file';
                                                $gradientClass = 'from-blue-500 to-cyan-500';
                                                $bgGradientClass = 'from-blue-50 to-cyan-50';
                                                $borderColor = 'border-blue-200';
                                                $textColor = 'text-blue-600';
                                                $badgeColor = 'bg-blue-100 text-blue-700';

                                                if (in_array($extension, ['pdf'])) {
                                                    $iconClass = 'fa-file-pdf';
                                                    $gradientClass = 'from-red-500 to-pink-500';
                                                    $bgGradientClass = 'from-red-50 to-pink-50';
                                                    $borderColor = 'border-red-200';
                                                    $textColor = 'text-red-600';
                                                    $badgeColor = 'bg-red-100 text-red-700';
                                                } elseif (in_array($extension, ['doc', 'docx'])) {
                                                    $iconClass = 'fa-file-word';
                                                    $gradientClass = 'from-blue-600 to-indigo-600';
                                                    $bgGradientClass = 'from-blue-50 to-indigo-50';
                                                    $borderColor = 'border-blue-200';
                                                    $textColor = 'text-blue-600';
                                                    $badgeColor = 'bg-blue-100 text-blue-700';
                                                } elseif (in_array($extension, ['xls', 'xlsx'])) {
                                                    $iconClass = 'fa-file-excel';
                                                    $gradientClass = 'from-green-500 to-emerald-500';
                                                    $bgGradientClass = 'from-green-50 to-emerald-50';
                                                    $borderColor = 'border-green-200';
                                                    $textColor = 'text-green-600';
                                                    $badgeColor = 'bg-green-100 text-green-700';
                                                } elseif (in_array($extension, ['ppt', 'pptx'])) {
                                                    $iconClass = 'fa-file-powerpoint';
                                                    $gradientClass = 'from-orange-500 to-red-500';
                                                    $bgGradientClass = 'from-orange-50 to-red-50';
                                                    $borderColor = 'border-orange-200';
                                                    $textColor = 'text-orange-600';
                                                    $badgeColor = 'bg-orange-100 text-orange-700';
                                                } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                                                    $iconClass = 'fa-file-image';
                                                    $gradientClass = 'from-purple-500 to-pink-500';
                                                    $bgGradientClass = 'from-purple-50 to-pink-50';
                                                    $borderColor = 'border-purple-200';
                                                    $textColor = 'text-purple-600';
                                                    $badgeColor = 'bg-purple-100 text-purple-700';
                                                }

                                                if ($fileSize) {
                                                    if ($fileSize < 1024) {
                                                        $formattedSize = $fileSize . ' B';
                                                    } elseif ($fileSize < 1048576) {
                                                        $formattedSize = round($fileSize / 1024, 1) . ' KB';
                                                    } else {
                                                        $formattedSize = round($fileSize / 1048576, 1) . ' MB';
                                                    }
                                                } else {
                                                    $formattedSize = '--';
                                                }
                                            @endphp

                                            <a href="{{ $fileUrl }}" target="_blank" class="group relative block bg-white/90 rounded-2xl border-2 {{ $borderColor }} hover:shadow-xl transition-all duration-500 overflow-hidden">
                                                <div class="h-2 bg-gradient-to-r {{ $gradientClass }}"></div>

                                                <div class="p-5">
                                                    <div class="flex items-start gap-4">
                                                        <div class="relative">
                                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br {{ $bgGradientClass }} flex items-center justify-center {{ $textColor }} shadow-lg group-hover:scale-110 transition-all duration-300">
                                                                <i class="fas {{ $iconClass }} text-4xl"></i>
                                                            </div>
                                                            <span class="absolute -bottom-2 -right-2 px-2 py-1 {{ $badgeColor }} rounded-lg text-xs font-bold shadow">
                                                                {{ strtoupper($extension ?: '?') }}
                                                            </span>
                                                        </div>

                                                        <div class="flex-1 min-w-0">
                                                            <h4 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors text-lg truncate" title="{{ $fileName }}">
                                                                {{ $fileNameShort }}
                                                            </h4>

                                                            <div class="mt-3 space-y-2">
                                                                <div class="flex items-center text-sm text-gray-500">
                                                                    <i class="fas fa-weight-hanging mr-3 {{ $textColor }}"></i>
                                                                    <span>Taille : <span class="font-medium text-gray-700">{{ $formattedSize }}</span></span>
                                                                </div>

                                                                @if($fileCreatedAt)
                                                                    <div class="flex items-center text-sm text-gray-500">
                                                                        <i class="far fa-calendar-alt mr-3 {{ $textColor }}"></i>
                                                                        <span>Ajouté : <span class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($fileCreatedAt)->format('d/m/Y') }}</span></span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-10 bg-white/85 rounded-2xl border border-blue-100">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-file text-3xl text-gray-400"></i>
                                        </div>
                                        <p class="text-gray-500 mb-2">Aucun document associé</p>
                                        <p class="text-xs text-gray-400">Ajoute des fichiers depuis la page de modification</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Colonne droite -->
                    <div class="space-y-8">
                        <!-- Actions rapides -->
                        <div class="section-badge bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-4">
                            <div class="h-2 bg-gradient-to-r from-orange-500 to-red-500"></div>

                            <div class="p-8">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                        <i class="fas fa-bolt text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">Actions rapides</h3>
                                        <p class="text-sm text-gray-500">Opérations disponibles</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-3">
                                    <a href="{{ route('responsable.livrables.edit', $livrable->id) }}" class="group relative flex items-center p-4 bg-gradient-to-br from-purple-50 to-white rounded-xl border-2 border-purple-100 hover:border-purple-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-all duration-300">
                                            <i class="fas fa-edit text-xl"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="font-bold text-gray-800 group-hover:text-purple-600 transition-colors">Modifier</p>
                                            <p class="text-sm text-gray-500">Mettre à jour ce livrable</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-gray-400 group-hover:text-purple-500 group-hover:translate-x-2 transition-all"></i>
                                    </a>

                                    <a href="{{ route('responsable.livrables.create') }}" class="group relative flex items-center p-4 bg-gradient-to-br from-green-50 to-white rounded-xl border-2 border-green-100 hover:border-green-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 group-hover:bg-green-500 group-hover:text-white transition-all duration-300">
                                            <i class="fas fa-plus text-xl"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="font-bold text-gray-800 group-hover:text-green-600 transition-colors">Nouveau livrable</p>
                                            <p class="text-sm text-gray-500">Créer un autre livrable</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-gray-400 group-hover:text-green-500 group-hover:translate-x-2 transition-all"></i>
                                    </a>

                                    <a href="#" onclick="window.print()" class="group relative flex items-center p-4 bg-gradient-to-br from-gray-50 to-white rounded-xl border-2 border-gray-100 hover:border-gray-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-600 group-hover:bg-gray-500 group-hover:text-white transition-all duration-300">
                                            <i class="fas fa-print text-xl"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="font-bold text-gray-800 group-hover:text-gray-600 transition-colors">Imprimer</p>
                                            <p class="text-sm text-gray-500">Version papier / PDF</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-gray-400 group-hover:text-gray-500 group-hover:translate-x-2 transition-all"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Informations système -->
                        <div class="section-badge bg-white/75 rounded-3xl shadow-2xl border border-gray-100 overflow-hidden animate-scale delay-5">
                            <div class="h-2 bg-gradient-to-r from-gray-500 to-slate-600"></div>

                            <div class="p-8">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-slate-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-gray-200">
                                        <i class="fas fa-clock text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">Informations système</h3>
                                        <p class="text-sm text-gray-500">Métadonnées du livrable</p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-calendar-plus text-blue-500 mr-2"></i>
                                            Créé le
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $livrable->created_at->format('d/m/Y H:i') }}</span>
                                    </div>

                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-pen text-green-500 mr-2"></i>
                                            Modifié le
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $livrable->updated_at->format('d/m/Y H:i') }}</span>
                                    </div>

                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-hashtag text-purple-500 mr-2"></i>
                                            Référence
                                        </span>
                                        <span class="font-semibold text-gray-800">#LIV-{{ str_pad($livrable->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>

                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-user text-orange-500 mr-2"></i>
                                            Créé par
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $livrable->user->first_name ?? Auth::user()->first_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conseils -->
                        <div class="grid grid-cols-1 gap-4">
                            <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 flex-shrink-0">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Conseil</p>
                                    <p class="text-xs text-gray-500">Vérifie les informations avant modification</p>
                                </div>
                            </div>

                            <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600 flex-shrink-0">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Tâches</p>
                                    <p class="text-xs text-gray-500">Toutes les tâches du livrable sont visibles ici</p>
                                </div>
                            </div>

                            <div class="bg-white/70 rounded-xl p-4 border border-gray-200 flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 flex-shrink-0">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Documents</p>
                                    <p class="text-xs text-gray-500">Ouvre les fichiers joints directement depuis cette page</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
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
    </div>
</x-app-layout>