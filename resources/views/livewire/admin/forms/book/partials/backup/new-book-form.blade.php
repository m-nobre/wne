<div>
    @php($key = App\Helpers\Tools::key(6))
    {{-- Success is as dangerous as failure. --}}
    <form>

        {{-- NORMAL TEXT INPUTS --}}
        <div class="my-3">
            <x-label for="form-title-{{$key}}" class="custom-label" class="custom-label" value="{{ __('Title') }}" />
            <x-input id="form-title-{{$key}}" class="block mt-1 w-full" type="text" name="form-title-{{$key}}"/>
        </div>
        <div class="my-3">
            <x-label for="form-subtitle-{{$key}}" class="custom-label" class="custom-label" value="{{ __('Subtitle') }}" />
            <x-input id="form-subtitle-{{$key}}" class="block mt-1 w-full" type="text" name="form-subtitle-{{$key}}" wire:model.live.debounce.1000ms="subtitle_input" x-cloak/>
            <code>@json($book_container)</code>
        </div>
        TEXTAREAD
        <div class="mb-3">
            <x-rich-text-area />
                
            @if (!$rich_text)
                <script>
                    function startMCE(el) {
                        tinymce.init({
                            selector: "#"+el,
                            license_key: 'gpl',
                            promotion: 'false',
                            /* TinyMCE configuration options */
                            skin: false,
                            content_css: false
                        });
                    };
                </script>
            @endif
        </div>


    </form>
</div>
@push('scripts')
    <script>
        $(function() {
            $('.tox-promotion-link').hide();
            $('.tox-statusbar__branding').hide();
        });
    </script>
@endpush
