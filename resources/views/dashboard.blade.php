<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="p-6 lg:p-8 w-full bg-white rounded-2xl shadow-sm dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-6 mt-3">
                        <x-application-logo class="h-12"/>
                    </div>
                    <div>

                            @livewire('admin.book-dash')

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
