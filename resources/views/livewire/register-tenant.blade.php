<div>
    @if (session('message'))
        <div class="flex items-center p-4 mb-6 text-green-800 border border-green-200 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
            <svg class="w-5 h-5 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-center p-4 mb-6 text-red-800 border border-red-200 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
            <svg class="w-5 h-5 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <form wire:submit="create">
        {{ $this->form }}

        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Crea Tenant
            </button>
        </div>
    </form>
</div>
