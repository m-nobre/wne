@php($key = Tools::key(6))

<div class="p-6 lg:p-8 w-full bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="h-12"/>
    <div class="px-6 py-4">
        <form>
            {{-- NORMAL TEXT INPUTS --}}
            <div class="my-3">
                <x-label for="form-title-{{$key}}" class="custom-label" value="{{ __('Title') }}" />
                <x-input id="form-title-{{$key}}" class="block mt-1 w-full" type="text" name="form-title-{{$key}}"  wire:model.live.debounce.1000ms="title"/>
            </div>
            <div class="my-3">
                <x-label for="form-subtitle-{{$key}}" class="custom-label" value="{{ __('Subtitle') }}" />
                <x-input id="form-subtitle-{{$key}}" class="block mt-1 w-full" type="text" name="form-subtitle-{{$key}}"/>
            </div>
        </form>
    </div>
    <p class="mt-3 text-gray-500 dark:text-gray-400 leading-relaxed">
        <x-rich-text-area />
    <script>
        $(function() {

            const textarea = document.querySelector("#form-subtitle-{{$key}}");

            textarea.addEventListener("input", updateValue);

            function updateValue(e) {
                console.log( e.target.value);
            }
        });
    </script>
    </p>
</div>

        {{-- if (!empty($request->input('mobile_number')) && substr($request->input('mobile_number'),0,1)!="+" ) {

            if (!empty($request->input('billing_country') )){

                $country = Country::where('code',$request->input('billing_country'))->firstOrFail();

                if (!empty($country->phone_indicator)){
                    
                    $request->merge(['mobile_number' => '+'. $country->phone_indicator .$request->input('mobile_number')]);
                    
                } elseif (!empty(\Helper::applicationSettings('system_prefix_mobile') )){

                    $request->merge(['mobile_number' => '+'.\Helper::applicationSettings('system_prefix_mobile') .$request->input('mobile_number')]);
                }
            } elseif (!empty(\Helper::applicationSettings('system_prefix_mobile') )){

                $request->merge(['mobile_number' => '+'.\Helper::applicationSettings('system_prefix_mobile') .$request->input('mobile_number')]);
            }
        } --}}