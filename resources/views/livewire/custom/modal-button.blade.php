<div>

    <button class="inline-flex items-center p-0 m-0 font-medium text-gray-600" type="button" onclick="openModal('modelConfirm-{{$key}}')">
        <i class="bi {{$icon}}" style="color:{{$colour}};"></i>
    </button>

    <div id="modelConfirm-{{$key}}" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-auto px-4 transition-all duration-1000 ease-in-out">
        <div class="relative top-24 mx-auto shadow-xl rounded-md bg-white max-w-sm ">
    
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm-{{$key}}')" type="button"
                    class="text-pink-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
    
            <div class="p-6 pt-0 text-center">
                @if ($type && $type === 'livewire')
                    
                    @livewire($view, ['model' => $model, 'element' => $element])

                @elseif ($type && $type != 'livewire')
                    
                    @include($view, ['model' => $model, 'element' => $element])
                
                @endif
            </div>
    
        </div>
    </div>

    @push('scripts')
        
        <script type="text/javascript">
            window.openModal = function(modalId) {
                document.getElementById(modalId).style.display = 'block'
                document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
            }
        
            window.closeModal = function(modalId) {
                document.getElementById(modalId).style.display = 'none'
                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            }
        
            // Close all modals when press ESC
            document.onkeydown = function(event) {
                event = event || window.event;
                if (event.keyCode === 27) {
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                    let modals = document.getElementsByClassName('modal');
                    Array.prototype.slice.call(modals).forEach(i => {
                        i.style.display = 'none'
                    })
                }
            };
        </script>
        <script>
            document.addEventListener('livewire:init', () => {
               Livewire.on('close-modal', (event) => {
                    closeModal("modelConfirm-{{$key}}")
               });
            });
        </script>
    @endpush
</div>

