<div class="w-full p-10 h-screen bg-slate-300">
    <form class="w-full md:w-[700px] xl:w-[500px] sm:mx-auto p-7 shadow-2xl rounded-lg left-0 bg-[#fff]" method="POST"
        action="{{ $action }}">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <label for="name" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                Nome
            </label>
            <input id="name"
                class="bg-[#f6f6f6] text-[#3a3a3a] font-bold text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                type="text" name="name" @if ($errors->any()) value="{{ old('name') }}" @endif
                @if (isset($user)) value="{{ $user->name }}" @endif required autofocus
                autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                Email
            </label>
            <input id="email"
                class="bg-[#f6f6f6] text-[#3a3a3a] font-bold text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                type="email" name="email" @if ($errors->any()) value="{{ old('email') }}" @endif
                @if (isset($user)) value="{{ $user->email }}" @endif required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                Senha
            </label>
            <input id="password"
                class="bg-[#f6f6f6] text-[#3a3a3a] font-bold text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                type="password" name="password" @if (!isset($user)) required @endif
                autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                Confirme a Senha
            </label>
            <input id="password_confirmation"
                class="bg-[#f6f6f6] text-[#3a3a3a] font-bold text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                type="password" name="password_confirmation" @if (!isset($user)) required @endif
                autocomplete="new-password" />
        </div>

        <div class="flex justify-center mt-4">
            <button type="submit"
                class="text-white delay-75 bg-[#1e1e1e] transition duration-300 hover:bg-[#00a859] focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold text-lg rounded-full text-[15px] w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
        </div>
    </form>
</div>
