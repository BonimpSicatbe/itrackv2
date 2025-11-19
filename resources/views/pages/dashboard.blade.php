<x-app-layout>
    <div class="flex items-center justify-center w-full h-full">
        <div class="max-h-[50%] grid grid-cols-3 gap-6 w-full h-full">
            <a href="{{ route('database') }}"
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-red-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-database text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">Database</span>
            </a>
            <a href=""
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-orange-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-file-lines text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">Report Generation</span>
            </a>
            <a href=""
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-yellow-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-file-contract text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">Contract Generation</span>
            </a>
            <a href=""
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-green-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-user-shield text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">PPE Generation</span>
            </a>
            <a href=""
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-teal-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-id-card text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">TUPAD ID - QR</span>
            </a>
            <a href=""
                class="flex flex-col gap-4 items-center justify-center w-full h-full bg-blue-500 rounded-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                <i class="fa-solid fa-file-invoice-dollar text-6xl text-gray-200"></i>
                <span class="text-gray-200 uppercase font-bold text-2xl">Payout</span>
            </a>
        </div>
    </div>
</x-app-layout>
