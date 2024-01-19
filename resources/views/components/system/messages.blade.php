@if (session('success.message'))
    <div class="absolute w-full flex justify-center">
        <div class="w-full md:w-[60%] m-[5px] mb-3 hidden items-center rounded-lg bg-success-100 border border-[#00a859] px-6 py-5 text-base text-success-700 data-[te-alert-show]:inline-flex"
            role="alert" data-te-alert-init data-te-alert-show>
            <p class="font-bold">{{ session('success.message') }}</p>
            <button type="button"
                class="ml-auto mt-0 box-content rounded-none border-none p-1 text-[#000] hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-te-alert-dismiss aria-label="Close">
                <span
                    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
@endif

@if (session('error.message'))
    <div class="absolute w-full flex justify-center">
        <div class="w-full md:w-[60%] m-[5px] mb-3 hidden items-center rounded-lg bg-[#f96f6f] border border-[#f00] px-6 py-5 text-base text-warning-100 data-[te-alert-show]:inline-flex"
            role="alert" data-te-alert-init data-te-alert-show>
            <p class="font-bold">{{ session('error.message') }}</p>
            <button type="button"
                class="ml-auto mt-0 box-content rounded-none border-none p-1 text-white hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-te-alert-dismiss aria-label="Close">
                <span
                    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="absolute w-full flex justify-center">
        <div class="w-full md:w-[60%] m-[5px] mb-3 hidden items-center rounded-lg bg-[#f96f6f] border border-[#f00] px-6 py-5 text-base text-warning-800 data-[te-alert-show]:inline-flex"
            role="alert" data-te-alert-init data-te-alert-show>
            <ul class="text-white font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button"
                class="ml-auto mt-0 box-content rounded-none border-none p-1 text-white hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-te-alert-dismiss aria-label="Close">
                <span
                    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
@endif
