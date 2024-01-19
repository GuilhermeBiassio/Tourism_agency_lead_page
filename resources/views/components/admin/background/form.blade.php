@extends('components.admin.main')
@section('main')
    <div class="w-full flex flex-col p-2 items-center t-[15px]">
        <a href="{{ route('background.create') }}" class="self-start">
            <button type="button"
                class="inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-800 hover:text-white"
                data-te-ripple-init>
                <span class="font-bold">Adicionar</span>
            </button>
        </a>
        <div
            class="w-full sml:w-[50%] rounded-lg border border-[#7f7f7fc9] m-[10px] bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
            <form class="flex flex-col space-y-10 items-center"
                @if (isset($data)) action="{{ route($action, $data->id) }}"
            @else
                action="{{ route($action) }}" @endif
                enctype="multipart/form-data" method="post" enctype="multipart/form-data">
                <h3 class="font-bold">Adicionar Background</h3>
                @csrf
                @if (isset($data))
                    @method('PUT')
                @endif
                <div
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-neutral-800 border-dashed rounded-lg bg-[#fff] ">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 max-w-full max-h-full" id="show-image">
                        @if (isset($data))
                            <img src="{{ env('ROOT_PATH') }}/storage/app/public/{{ $data->background_file }}"
                                alt="Background image" class="max-w-full max-h-full rounded">
                        @else
                            <p class="font-bold">Preview da imagem</p>
                        @endif
                    </div>
                </div>
                <input id="dropzone-file"
                    class="bg-gray-200 font-semibold text-[#292828] text-[13px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    type="file" name="background_file" accept="image/png, image/jpeg" />

                <div class="mb-5 w-full space-y-4">
                    <label for="name" class="block mb-2 font-bold text-md text-[#3a3a3a] p-2 text-[15px]">Link QR
                        Code</label>
                    <input type="text" name="qrcode_link" id="qrcode_input"
                        class="bg-gray-200 font-semibold text-[#292828] text-[13px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Link..."
                        @if ($errors->any()) value="{{ old('qrcode_link') }}" 
                        @else
                            @if (isset($data))
                                value="{{ $data->qrcode_link }}" @endif
                        @endif
                    required>
                    <button type="button" id="qrcode_btn"
                        class="w-full inline-block rounded border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-primary hover:text-white"
                        data-te-ripple-init>
                        <span class="font-bold">Ver QR Code</span>
                    </button>
                </div>

                <div id="qrcode" class="hidden"></div>

                <!--Submit button-->
                <button type="submit"
                    class="w-full inline-block rounded border-2 border-[#00a859] px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-[#00a859] transition duration-150 ease-in-out hover:bg-[#00a859] hover:text-white"
                    data-te-ripple-init>
                    <span class="font-bold">Salvar</span>
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ env('ROOT_PATH') }}/public/assets/js/qrcode.js"></script>
@endsection
