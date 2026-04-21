<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLiLu.ai - Chat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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

        .new-chat-btn {
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
            width: 100%;
        }

        .new-chat-btn:hover { background-color: #ffd54f; }

        .search-chat {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
            padding: 0 8px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #fafafa;
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid #e0e0e0;
            background-color: #ffffff;
            flex-shrink: 0;
        }

        .header-left { display: flex; align-items: center; gap: 12px; }

        .header-title { font-size: 16px; font-weight: 600; color: #333; }

        .menu-toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
        }

        .menu-toggle-btn:hover { background-color: #f0f0f0; }

        /* Chat Area */
        .chat-area {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            scroll-behavior: smooth;
        }

        .empty-state {
            text-align: center;
            color: #aaa;
            font-size: 16px;
            margin: auto;
        }

        .message-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .user-bubble-wrapper { display: flex; justify-content: flex-end; }
        .ai-bubble-wrapper { display: flex; justify-content: flex-start; align-items: flex-start; gap: 10px; }

        .ai-avatar {
            width: 32px;
            height: 32px;
            background-color: #ffe082;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .user-bubble {
            background-color: #ffe082;
            color: #333;
            padding: 12px 16px;
            border-radius: 18px 18px 4px 18px;
            max-width: 100%;
            font-size: 14px;
            line-height: 1.6;
            word-wrap: break-word;
        }

        .ai-bubble {
            background-color: #ffffff;
            color: #333;
            padding: 12px 16px;
            border-radius: 18px 18px 18px 4px;
            max-width: 70%;
            font-size: 14px;
            line-height: 1.6;
            word-wrap: break-word;
            border: 1px solid #e0e0e0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }

        .bubble-label {
            font-size: 11px;
            color: #999;
            margin-bottom: 4px;
            padding: 0 4px;
        }

        .user-label { text-align: right; }

        /* Typing indicator */
        .typing-indicator {
            display: none;
            align-items: center;
            gap: 10px;
            padding: 0 24px;
        }

        .typing-indicator.active { display: flex; }

        .typing-bubble {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 18px 18px 18px 4px;
            padding: 12px 16px;
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: #aaa;
            border-radius: 50%;
            animation: bounce 1.2s infinite;
        }

        .dot:nth-child(2) { animation-delay: 0.2s; }
        .dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes bounce {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-6px); }
        }

        /* Input */
        .input-container { padding: 16px 24px 24px; flex-shrink: 0; }

        .input-wrapper { max-width: 800px; margin: 0 auto; }

        .input-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background-color: #ffffff;
            border: 2px solid #ffe082;
            border-radius: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: border-color 0.2s;
        }

        .input-box:focus-within { border-color: #ffd54f; }

        .chat-input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            resize: none;
            max-height: 120px;
            line-height: 1.5;
        }

        .chat-input::placeholder { color: #999; }

        .send-btn {
            background-color: #ffe082;
            border: none;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #333;
            transition: background-color 0.2s;
            flex-shrink: 0;
        }

        .send-btn:hover { background-color: #ffd54f; }
        .send-btn:disabled { opacity: 0.5; cursor: not-allowed; }

        .powered-by {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 10px;
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

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0; left: 0;
                height: 100%;
                z-index: 300;
                transform: translateX(0);
            }
            .sidebar.collapsed { transform: translateX(-100%); }
            .overlay {
                display: none;
                position: fixed;
                top: 0; left: 0;
                width: 100%; height: 100%;
                background: rgba(0,0,0,0.3);
                z-index: 250;
            }
            .overlay.active { display: block; }
        }
    </style>
</head>
<body>
<div class="container">

    <aside class="sidebar" id="sidebar">
        {{-- New Chat clears session --}}
        <form action="{{ route('chatbot.clear') }}" method="POST">
            @csrf
            <button class="new-chat-btn" type="submit">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                New Chat
            </button>
        </form>

        <div class="search-chat">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <span>Search Chat</span>
        </div>

        <div class="section-title">Percakapan</div>
    </aside>

    <div class="overlay" id="overlay"></div>

    <main class="main-content">
        <header class="header">
            <div class="header-left">
                <button class="menu-toggle-btn" id="menuToggleBtn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="header-title">LeLiLu.ai</h1>
            </div>
        </header>

        {{-- Chat Messages --}}
        <div class="chat-area" id="chatArea">
            @if(session('chat_history') && count(session('chat_history')) > 0)
                @foreach(session('chat_history') as $chat)
                    <div class="message-row">
                        {{-- User Bubble --}}
                        <div class="user-bubble-wrapper">
                            <div>
                                <div class="bubble-label user-label">You</div>
                                <div class="user-bubble">{{ $chat['prompt'] }}</div>
                            </div>
                        </div>
                        {{-- AI Bubble --}}
                        <div class="ai-bubble-wrapper">
                            <div class="ai-avatar">""</div>
                            <div>
                                <div class="bubble-label">Gemini</div>
                                <div class="ai-bubble">{!! nl2br(e($chat['response'])) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">"" Mulai percakapan...</div>
            @endif
        </div>

        {{-- Typing Indicator --}}
        <div class="typing-indicator" id="typingIndicator">
            <div class="ai-avatar">""</div>
            <div class="typing-bubble">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        {{-- Input --}}
        <div class="input-container">
            <div class="input-wrapper">
                <form action="{{ route('gemini.ask') }}" method="POST" id="chatForm">
                    @csrf
                    <div class="input-box">
                        <textarea
                            name="prompt"
                            id="chatInput"
                            class="chat-input"
                            placeholder="Tanya apa saja..."
                            rows="1"
                            required></textarea>
                        <button type="submit" class="send-btn" id="sendBtn">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim
                        </button>
                    </div>
                </form>
                <div class="powered-by">
                    <span>Powered By:</span>
                    <div class="gemini-badge">✨ Gemini</div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuToggleBtn = document.getElementById('menuToggleBtn');
    let isMobile = window.innerWidth <= 768;

    menuToggleBtn.addEventListener('click', () => {
        if (isMobile) {
            sidebar.classList.remove('collapsed');
            overlay.classList.add('active');
        } else {
            sidebar.classList.toggle('collapsed');
        }
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('collapsed');
        overlay.classList.remove('active');
    });

    window.addEventListener('resize', () => {
        isMobile = window.innerWidth <= 768;
        if (!isMobile) overlay.classList.remove('active');
    });

    // Auto-scroll to bottom
    const chatArea = document.getElementById('chatArea');
    chatArea.scrollTop = chatArea.scrollHeight;

    // Auto-resize textarea
    const chatInput = document.getElementById('chatInput');
    chatInput.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });

    // Enter to submit, Shift+Enter for new line
    chatInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            if (this.value.trim()) {
                document.getElementById('chatForm').submit();
            }
        }
    });

    // Show typing indicator on submit
    document.getElementById('chatForm').addEventListener('submit', function () {
        const input = chatInput.value.trim();
        if (!input) return;

        // Disable button to prevent double submit
        const sendBtn = document.getElementById('sendBtn');
        sendBtn.disabled = true;
        sendBtn.innerHTML = '...';

        // Show typing indicator
        document.getElementById('typingIndicator').classList.add('active');

        // Scroll to bottom
        chatArea.scrollTop = chatArea.scrollHeight;
    });
</script>
</body>
</html>