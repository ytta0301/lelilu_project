{{-- resources/views/chat.blade.php --}}
{{-- File standalone: tidak perlu extends/layout --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LeLiLu.ai - Chat</title>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            height: 100vh;
            overflow: hidden;
        }
        .container { display: flex; height: 100vh; }
        
        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            padding: 12px;
            flex-shrink: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
            position: absolute;
            opacity: 0;
            pointer-events: none;
            z-index: 100;
        }
        .new-chat {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background-color: #ffe082;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 12px;
            transition: background-color 0.2s;
        }
        .new-chat:hover { background-color: #ffd54f; }
        .search-chat {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .search-chat:hover { background-color: #f5f5f5; }
        .section-title {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
            padding: 0 8px;
        }
        .conversation-item {
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 4px;
        }
        .conversation-item:hover { background-color: #f5f5f5; }
        .conversation-item.active {
            background-color: #fff3cd;
            border-left: 3px solid #ffc107;
        }
        .conversation-title {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .conversation-preview {
            font-size: 12px;
            color: #999;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #fafafa;
            position: relative;
            overflow: hidden;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid #e0e0e0;
            background-color: #ffffff;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }
        .menu-toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .menu-toggle-btn:hover { background-color: #f0f0f0; }

        /* Chat Area */
        .chat-area {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .empty-state {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin: auto;
        }
        .message {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 15px;
            line-height: 1.5;
            word-wrap: break-word;
        }
        .message.user {
            align-self: flex-end;
            background-color: #ffe082;
            color: #333;
            border-bottom-right-radius: 4px;
        }
        .message.assistant {
            align-self: flex-start;
            background-color: #ffffff;
            color: #333;
            border: 1px solid #e0e0e0;
            border-bottom-left-radius: 4px;
        }

        /* Input Area */
        .input-container {
            padding: 20px 24px 24px;
        }
        .input-wrapper {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }
        .input-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background-color: #ffffff;
            border: 2px solid #ffe082;
            border-radius: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: border-color 0.2s;
        }
        .input-box:focus-within {
            border-color: #ffd54f;
            outline: none;
        }
        .add-btn, .mic-btn, .send-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            color: #666;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .add-btn:hover, .mic-btn:hover {
            background-color: #f5f5f5;
            color: #333;
        }
        .send-btn {
            background-color: #ffe082;
            color: #333;
        }
        .send-btn:hover { background-color: #ffd54f; }
        .chat-input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            min-height: 24px;
            max-height: 150px;
            resize: none;
        }
        .chat-input::placeholder { color: #999; }

        /* Powered By */
        .powered-by {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 12px;
            font-size: 12px;
            color: #999;
        }
        .gemini-badge {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            background-color: #f0f0f0;
            border-radius: 12px;
            font-size: 11px;
        }

        /* Loading Animation */
        .loading {
            display: flex;
            gap: 4px;
            align-items: center;
        }
        .loading span {
            width: 8px;
            height: 8px;
            background-color: #999;
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out both;
        }
        .loading span:nth-child(1) { animation-delay: -0.32s; }
        .loading span:nth-child(2) { animation-delay: -0.16s; }
        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 300;
            }
            .sidebar.collapsed { transform: translateX(-100%); }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.3);
                z-index: 250;
            }
            .overlay.active { display: block; }
            .message { max-width: 90%; }
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Sidebar --}}
        <aside class="sidebar {{ request('sidebar') === 'closed' ? 'collapsed' : '' }}" id="sidebar">
            <button class="new-chat" id="newChatBtn" data-url="{{ route('chat.new') ?? '#' }}">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
                New Chat
            </button>

            <div class="search-chat">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span>Search Chat</span>
            </div>

            <div class="section-title">Percakapan</div>

            {{-- Dynamic Conversation List --}}
            @forelse($conversations ?? [] as $conversation)
                <div class="conversation-item {{ isset($currentConversation) && $currentConversation->id === ($conversation->id ?? null) ? 'active' : '' }}" 
                     data-id="{{ $conversation->id ?? '' }}"
                     data-url="{{ route('chat.load', $conversation->id) ?? '#' }}">
                    <div class="conversation-title">{{ \Illuminate\Support\Str::limit($conversation->title ?? 'Tanpa Judul', 30) }}</div>
                    <div class="conversation-preview">{{ \Illuminate\Support\Str::limit($conversation->last_message ?? 'Belum ada pesan', 40) }}</div>
                </div>
            @empty
                <div class="conversation-item">
                    <div class="conversation-title">Belum ada percakapan</div>
                    <div class="conversation-preview">Mulai chat baru untuk memulai</div>
                </div>
            @endforelse
        </aside>

        <div class="overlay" id="overlay"></div>

        {{-- Main Content --}}
        <main class="main-content">
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle-btn" id="menuToggleBtn" title="Menu">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="header-title">LeLiLu.ai</h1>
                </div>
            </header>

            {{-- Chat Area --}}
            <div class="chat-area" id="chatArea">
                @if(isset($messages) && count($messages) > 0)
                    @foreach($messages as $message)
                        <div class="message {{ ($message->role ?? '') === 'user' ? 'user' : 'assistant' }}">
                            {!! nl2br(e($message->content ?? '')) !!}
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">Mulai percakapan...</div>
                @endif
            </div>

            {{-- Input Area --}}
            <div class="input-container">
                <div class="input-wrapper">
                    <form id="chatForm" action="{{ route('chat.send') ?? '#' }}" method="POST">
                        @csrf
                        <input type="hidden" name="conversation_id" id="conversationId" value="{{ $currentConversation->id ?? '' }}">
                        
                        <div class="input-box">
                            <button type="button" class="add-btn" title="Tambah lampiran">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                            <textarea 
                                name="message" 
                                class="chat-input" 
                                placeholder="Tanya apa saja" 
                                rows="1"
                                id="chatInput"
                            ></textarea>
                            <button type="button" class="mic-btn" title="Suara">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                </svg>
                            </button>
                            <button type="submit" class="send-btn" title="Kirim" id="sendBtn">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="powered-by">
                        <span>Powered By:</span>
                        <div class="gemini-badge">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Gemini
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuToggleBtn = document.getElementById('menuToggleBtn');
        const chatForm = document.getElementById('chatForm');
        const chatInput = document.getElementById('chatInput');
        const chatArea = document.getElementById('chatArea');
        const sendBtn = document.getElementById('sendBtn');
        let isMobile = window.innerWidth <= 768;

        // Toggle Sidebar
        function toggleSidebar() {
            if (isMobile) {
                sidebar.classList.remove('collapsed');
                overlay.classList.add('active');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        }
        menuToggleBtn?.addEventListener('click', toggleSidebar);
        overlay?.addEventListener('click', function() {
            sidebar.classList.add('collapsed');
            overlay.classList.remove('active');
        });
        window.addEventListener('resize', function() {
            isMobile = window.innerWidth <= 768;
            if (!isMobile) overlay?.classList.remove('active');
        });

        // Auto-resize textarea
        chatInput?.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 150) + 'px';
        });

        // Handle Enter key
        chatInput?.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                if (this.value.trim()) chatForm?.requestSubmit();
            }
        });

        // Form submission with AJAX
        chatForm?.addEventListener('submit', async function(e) {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (!message) return;

            const conversationId = document.getElementById('conversationId')?.value;
            const formData = new FormData();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content ?? '');
            formData.append('message', message);
            if (conversationId) formData.append('conversation_id', conversationId);

            // Show user message
            addMessage(message, 'user');
            chatInput.value = '';
            chatInput.style.height = 'auto';
            
            // Show loading
            const loadingId = addLoading();
            if (sendBtn) sendBtn.disabled = true;

            try {
                const response = await fetch(chatForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await response.json();
                removeLoading(loadingId);
                
                if (data.success) {
                    addMessage(data.response, 'assistant');
                    if (data.conversation_id && !conversationId && document.getElementById('conversationId')) {
                        document.getElementById('conversationId').value = data.conversation_id;
                    }
                } else {
                    addMessage('Maaf, terjadi kesalahan: ' + (data.message || 'Silakan coba lagi.'), 'assistant');
                }
            } catch (error) {
                removeLoading(loadingId);
                addMessage('Maaf, koneksi terputus. Silakan periksa koneksi Anda.', 'assistant');
                console.error('Error:', error);
            } finally {
                if (sendBtn) sendBtn.disabled = false;
                chatInput?.focus();
            }
        });

        // Helper: Add message
        function addMessage(content, role) {
            const emptyState = chatArea?.querySelector('.empty-state');
            if (emptyState) emptyState.remove();
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${role}`;
            messageDiv.textContent = content;
            chatArea?.appendChild(messageDiv);
            if (chatArea) chatArea.scrollTop = chatArea.scrollHeight;
        }

        // Helper: Add loading
        function addLoading() {
            const id = 'loading-' + Date.now();
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'message assistant';
            loadingDiv.id = id;
            loadingDiv.innerHTML = '<div class="loading"><span></span><span></span><span></span></div>';
            chatArea?.appendChild(loadingDiv);
            if (chatArea) chatArea.scrollTop = chatArea.scrollHeight;
            return id;
        }

        // Helper: Remove loading
        function removeLoading(id) {
            const loading = document.getElementById(id);
            if (loading) loading.remove();
        }

        // New Chat button
        document.getElementById('newChatBtn')?.addEventListener('click', function(e) {
            e.preventDefault();
            if (this.dataset.url && this.dataset.url !== '#') {
                window.location.href = this.dataset.url;
            }
        });

        // Load conversation
        document.querySelectorAll('.conversation-item').forEach(item => {
            item.addEventListener('click', function() {
                if (this.dataset.url && this.dataset.url !== '#') {
                    window.location.href = this.dataset.url;
                }
            });
        });

        // Focus input
        chatInput?.focus();
    });
    </script>
</body>
</html>