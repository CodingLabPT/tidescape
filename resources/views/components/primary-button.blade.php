<style>
    button.btn {
        border: 2px solid #1E84FE;
        background-color: #1E84FE;
        color: #fff;
    }

    button.btn:hover {
        background-color: #fff;;
        color: #1E84FE;
    }

</style>

<button class="btn" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
