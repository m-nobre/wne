<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mb-3">
        <x-label for="description-{{$key}}" class="custom-label" value="{{ __('Description') }}" />
        <div wire:ignore>
            <textarea id="description-{{$key}}" type="text" rows="3" class="TinyMCE border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{!! $description !!}</textarea>
        </div>
        
    </div>

    @script
    <script>
        Livewire.on('bookDescription', description => {
            tinymce.get("description-{{$key}}").setContent(description.description ?? '');
        })
        </script>
    @endscript

    @push('scripts')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                tinymce.init({
                    selector: '.TinyMCE',
                    license_key: 'gpl',
                    promotion: false,
                    /* TinyMCE configuration options */
                    skin: false,
                    content_css: false,
                    height: 300,
                    setup: (editor) => {
                        editor.on('input', (e) => {
                            // console.log(e);
                            Livewire.dispatch('description-edited', {value: e.target.innerHTML, element:e.target.dataset.id});

                        });
                    
                    }
                });
            });
        </script>

    @endpush
</div>
