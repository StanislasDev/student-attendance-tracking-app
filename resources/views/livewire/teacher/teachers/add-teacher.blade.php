<div>
    <!-- Comment Form -->
    <div class="max-w-[85rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <div class="mx-auto max-w-2xl">
            <div class="text-center mb-2">
                <div class="flex justify-center mb-2">
                    <svg class="w-14 h-14 text-indigo-600 fade-in" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.25v-1.5A2.75 2.75 0 017.25 15h9.5a2.75 2.75 0 012.75 2.75v1.5M12 12v.01" />
                    </svg>
                </div>
                <h2 class="text-xl text-gray-800 font-bold sm:text-3xl dark:text-white fade-in" style="animation-delay:0.1s">Add teacher</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 fade-in" style="animation-delay:0.2s">
                    Fill out the form to add a new teacher.
                </p>
            </div>
            <!-- Card -->
            <div class="mt-5 p-4 relative z-10 bg-white border border-gray-200 rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700 fade-in" style="animation-delay:0.4s">
                <form wire:submit="save">
                    <div class="mb-4 sm:mb-8">
                        <label for="teacher-name"
                            class="block mb-2 text-sm font-medium dark:text-white">Full name</label>
                        <input id="teacher-name" type="text" 
                            wire:model="name"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Enter full name" autocomplete="name">
                            @error('name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-4 sm:mb-8">
                        <label for="teacher-email"
                            class="block mb-2 text-sm font-medium dark:text-white">Email</label>
                        <input id="teacher-email" type="email" 
                            wire:model="email"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Email" autocomplete="email">
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="teacher-password"
                            class="block mb-2 text-sm font-medium dark:text-white">Mot de passe</label>
                        <input id="teacher-password" type="password"
                            wire:model="password"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Enter password" autocomplete="new-password">
                        @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="teacher-password-confirmation"
                            class="block mb-2 text-sm font-medium dark:text-white">Confirm password</label>
                        <input id="teacher-password-confirmation" type="password"
                            wire:model="password_confirmation"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Confirm password" autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mt-6 grid">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            <div wire:loading class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-white rounded-full dark:text-white" role="status" aria-label="loading">
                                <span class="sr-only">loading...</span>
                            </div>
                            submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Comment Form -->
<style>
    .fade-in {
        animation: fadeIn 0.7s cubic-bezier(.4,0,.2,1) both;
        opacity: 0;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: none; }
    }
</style>
</div>