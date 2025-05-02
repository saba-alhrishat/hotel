<div class="auth-card">
    <div class="auth-logo">
        <!-- يمكنك استبدال الشعار بشعار فندقي -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#8B4513" width="72" height="72">
            <path d="M19 21H5a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2zm-7-9a3 3 0 1 0-3-3 3 3 0 0 0 3 3z"/>
        </svg>
    </div>

    <h1 class="auth-title">{{ $title ?? 'Welcome to Our Hotel' }}</h1>

    {{ $slot }}
</div>