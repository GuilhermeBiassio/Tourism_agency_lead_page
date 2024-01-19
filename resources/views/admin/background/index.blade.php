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

        @if (!$images->isEmpty())
            @foreach ($images as $image)
                <div class="flex flex-col sml:w-[70%] m-[5px] p-5 border border-[#7f7f7fc9] shadow-2xl rounded-lg">
                    <div class="flex flex-col sml:flex-row">
                        <div class="w-full">
                            <img class=" max-w-full max-h-full rounded"
                                src="{{ env('ROOT_PATH') }}/storage/app/public/{{ $image->background_file }}"
                                alt="Background-image">
                        </div>
                        <div class="w-full flex flex-col justify-end">
                            <div class="w-full flex flex-col justify-end p-2">
                                <label class="font-bold">Link do QR Code:</label>
                                <a href="{{ $image->qrcode_link }}"
                                    class="rounded px-6 pb-2 pt-2.5 text-xs font-semibold leading-normal text-primary transition duration-150 ease-in-out hover:bg-neutral-100 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700"
                                    target="_blank">{{ $image->qrcode_link }}</a>
                            </div>
                            <div class="w-full flex flex-col p-2 mt-6">
                                <a href="{{ route('background.edit', $image->id) }}"
                                    class="inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-bold text-center uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-800 hover:text-white">
                                    Editar
                                </a>
                                <form action="{{ route('background.destroy', $image->id) }}" class="w-full" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="delete-btn w-full mt-2 inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-danger-600 hover:text-white"
                                        data-te-ripple-init>
                                        <span class="font-bold">Excluir</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h4 class="font-bold">Nenhuma imagem cadastrada!</h4>
        @endif
    </div>
@endsection
