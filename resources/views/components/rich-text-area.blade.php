@props(['key'])

<div x-data="{ message: '' }">
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <x-label for="form-description-{{$key}}" class="custom-label" value="{{ __('Description') }}" />
    <textarea id="form-description-{{$key}}" rows="3" class="TinyMCE border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" ></textarea>

    <script>

        $(function() {
            const bc = new BroadcastChannel("main");
            addEventListener("textarea#form-description-{{$key}}", (event) => {
                bc.postMessage($("#form-description-{{$key}}").text());
            });
        });

    </script>
</div>