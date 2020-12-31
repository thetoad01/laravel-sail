{{-- <div class="hidden"> --}}
<div class="block">
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="my_name">
            My Name
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="my_name"
            id="my_name">
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="my_time">
            My Time
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="my_time"
            value="{{ microtime(true) }}"
            id="my_time">
    </div>
</div>
