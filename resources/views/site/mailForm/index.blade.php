@extends('components.site.main')
@section('header')
    @include('components.site.header')
@endsection

@section('main')
    <div id="bg-auto" class="bg-no-repeat bg-cover bg-left-bottom sm:bg-center">
        <div class="w-full p-5 sm:p-20 bg-[#595959]/[.6]">
            <div class="flex flex-col xl:grid xl:grid-rows-3 xl:grid-cols-2 basis-20">
                <div class="w-full mb-10 xl:mb-0 row-span-1 xl:row-span-3 xl:col-span-1 sm:p-5">
                    <form id="form"
                        class="w-full md:w-[700px] xl:w-[500px] sm:mx-auto p-7 shadow-2xl rounded-lg left-0 bg-[#fff]"
                        method="post" action="{{ route('site.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">Nome
                                Completo</label>
                            <input type="name" name="client_name"
                                class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Seu nome..." required
                                @if ($errors->any()) value="{{ old('client_name') }}" @endif>
                        </div>
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">E-mail</label>
                            <input type="text" name="email"
                                class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Seu E-mail..." required
                                @if ($errors->any()) value="{{ old('email') }}" @endif>
                        </div>
                        <div class="mb-5">
                            <label for="phone"
                                class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">Telefone</label>
                            <input type="text" name="phone"
                                class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="(**) ****-****" maxlength="15" onkeyup="handlePhone(event)" required
                                @if ($errors->any()) value="{{ old('phone') }}" @endif>
                        </div>
                        <div class="mb-5">
                            <label for="message"
                                class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">Mensagem</label>
                            <textarea rows="10" name="message"
                                class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-md h-1/2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Sua mensagem">
@if ($errors->any()) {{ old('message') }}    @endif
</textarea>
                        </div>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="check" type="checkbox" name="terms"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                    required
                                    @if ($errors->any()) @if (old('terms'))
                                                checked @endif
                                    @endif>
                            </div>
                            <label for="check" class="ms-2 text-[15px] font-bold text-lg text-[#3a3a3a]">Aceitar os
                                <button type="button" class="text-blue-600 hover:underline" data-te-toggle="modal"
                                    data-te-target="#terms" data-te-ripple-init data-te-ripple-color="light">
                                    Termos de condição
                                </button>
                            </label>
                        </div>
                        <div class="flex justify-center m-[10px]">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white delay-75 bg-[#1e1e1e] transition duration-300 hover:bg-[#00a859] focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold text-lg rounded-full text-[15px] w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                    </form>
                </div>
                <div class="w-full sm:mb-10 xl:row-span-1 order-first xl:order-2">
                    <div class="w-full p-10 sm:p-0 mt-0 flex flex-col">
                        <img class="w-[280px] h-[130px] sm:w-[380px] sm:h-[185px] self-center"
                            src="{{ env('ROOT_PATH') }}/storage/app/public/site/logo_.png" alt="Logo">
                        <h5 class="text-white text-center font-bold sm:text-2xl">Realize seu cadastro para
                            receber
                            prêmios
                        </h5>
                    </div>
                </div>
                <div class="flex flex-col items-center w-full xl:row-span-2 order-last">
                    <p class="font-bold text-white">Leia o QR code, ou clique, e entre no site parceiro</p>
                    <a href="#" target="_blank" id="qrcode_link">
                        <div id="qrcode" class="rounded p-2 bg-[#fff]"></div>
                    </a>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="terms" tabindex="-1" aria-labelledby="terms" aria-hidden="true">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 min-[0px]:rounded-none">
                        <!-- Modal title -->
                        <h5 class="text-xl leading-normal text-neutral-800" id="termsLabel">
                            Termos de condição
                        </h5>
                        <!-- Close button -->
                        <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="relative p-4 min-[0px]:overflow-y-auto">
                        <p class="px-10 text-center leading-[3rem] font-bold">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Cras tincidunt lobortis feugiat vivamus at augue eget.
                            Convallis convallis tellus id interdum velit laoreet id. Quis imperdiet massa tincidunt
                            nunc. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Vitae
                            suscipit
                            tellus mauris a diam maecenas. Tellus in metus vulputate eu scelerisque felis imperdiet.
                            Nullam vehicula ipsum a arcu cursus vitae congue. Leo integer malesuada nunc vel risus
                            commodo viverra maecenas accumsan. Gravida arcu ac tortor dignissim convallis aenean et
                            tortor. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Auctor elit sed
                            vulputate mi. Elementum nisi quis eleifend quam adipiscing vitae. Ut sem viverra aliquet
                            eget sit amet. Ipsum dolor sit amet consectetur adipiscing. Ultrices dui sapien eget mi.
                            Augue mauris augue neque gravida in. Facilisis sed odio morbi quis commodo odio aenean
                            sed.
                            Proin sed libero enim sed faucibus turpis.

                            Magna fringilla urna porttitor rhoncus dolor purus. Magna fermentum iaculis eu non diam
                            phasellus vestibulum lorem. Sed elementum tempus egestas sed sed risus pretium. Elit ut
                            aliquam purus sit amet. Felis donec et odio pellentesque diam volutpat. Dictumst
                            vestibulum
                            rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Viverra mauris in
                            aliquam sem fringilla ut. Neque ornare aenean euismod elementum nisi quis eleifend quam
                            adipiscing. Nunc congue nisi vitae suscipit tellus mauris a diam maecenas. Lorem mollis
                            aliquam ut porttitor leo a diam sollicitudin tempor. Tellus at urna condimentum mattis.
                            Amet
                            justo donec enim diam vulputate. Posuere morbi leo urna molestie at elementum eu.

                            Purus in massa tempor nec feugiat nisl pretium fusce. Morbi blandit cursus risus at
                            ultrices
                            mi tempus imperdiet nulla. Leo integer malesuada nunc vel risus commodo viverra maecenas
                            accumsan. Nullam eget felis eget nunc. Eu scelerisque felis imperdiet proin fermentum
                            leo
                            vel. Ut lectus arcu bibendum at varius vel pharetra. Nulla facilisi cras fermentum odio
                            eu
                            feugiat pretium. Tempor commodo ullamcorper a lacus vestibulum sed arcu. A iaculis at
                            erat
                            pellentesque adipiscing. Neque volutpat ac tincidunt vitae semper quis. Eu mi bibendum
                            neque
                            egestas congue. Pulvinar etiam non quam lacus suspendisse faucibus interdum posuere.

                            Amet consectetur adipiscing elit ut. Interdum posuere lorem ipsum dolor sit amet. Ac
                            felis
                            donec et odio pellentesque diam volutpat commodo. Dictum varius duis at consectetur
                            lorem
                            donec massa sapien faucibus. Scelerisque in dictum non consectetur a erat nam. Purus non
                            enim praesent elementum. Diam donec adipiscing tristique risus nec feugiat in. Nec
                            ullamcorper sit amet risus nullam eget. Donec ultrices tincidunt arcu non sodales neque
                            sodales. Amet consectetur adipiscing elit pellentesque habitant morbi. Tellus rutrum
                            tellus
                            pellentesque eu tincidunt. Odio aenean sed adipiscing diam donec adipiscing tristique
                            risus
                            nec. Cursus sit amet dictum sit amet justo donec. Nec ultrices dui sapien eget mi proin.
                            Nam
                            aliquam sem et tortor consequat id. Enim diam vulputate ut pharetra sit amet aliquam.
                            Tempus
                            iaculis urna id volutpat lacus laoreet non curabitur.

                            Tristique et egestas quis ipsum suspendisse ultrices. Senectus et netus et malesuada
                            fames
                            ac turpis egestas. Cursus risus at ultrices mi tempus imperdiet nulla malesuada
                            pellentesque. Nisl vel pretium lectus quam. Venenatis lectus magna fringilla urna
                            porttitor
                            rhoncus dolor purus. Gravida rutrum quisque non tellus orci ac auctor. Nisi est sit amet
                            facilisis magna etiam tempor. Id volutpat lacus laoreet non curabitur gravida arcu ac
                            tortor. Neque sodales ut etiam sit amet. Commodo nulla facilisi nullam vehicula ipsum a.
                            Tortor consequat id porta nibh venenatis cras. Aliquet nec ullamcorper sit amet risus
                            nullam. Lacus viverra vitae congue eu consequat ac felis. Eleifend mi in nulla posuere
                            sollicitudin aliquam ultrices sagittis. Posuere lorem ipsum dolor sit amet consectetur
                            adipiscing.
                        </p>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@section('scripts')
    <script src="{{ env('ROOT_PATH') }}/public/assets/js/qrcode.js"></script>
    <script>
        var index = 0;
        const form = document.querySelector('#form');
        const qrcode_link = document.querySelector('#qrcode_link');
        const img_path = "{{ env('ROOT_PATH') }}/storage/app/public/";
        @if ($images)
            const imgs = [
                @foreach ($images as $image)
                    "{{ $image->background_file }}",
                @endforeach
            ];
            const qr = [
                @foreach ($images as $image)
                    "{{ $image->qrcode_link }}",
                @endforeach
            ];
        @else
        @endif
        const sectionBg = document.querySelector('#bg-auto');
        const sectionQr = document.querySelector('#qr-img');

        function BgChange() {
            if (index >= imgs.length) {
                index = 0;
            }
            sectionBg.style.backgroundImage = 'url("' + img_path + imgs[index] + '")';
            qrcode_link.href = qr[index];
            qrcodeGenerator(qr[index], 250, 250);
            ++index;
        }

        window.onload = function() {
            BgChange();
            setInterval(BgChange, 5000);
        }

        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (grecaptcha.getResponse() == "") {
                alert('Selecione a caixa "Não sou um robô"');
            } else {
                form.submit();
            };
        });
    </script>
@endsection
