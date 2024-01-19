@extends('components.admin.main')
@section('main')
    <div class="h-screen w-full flex justify-center">
        <div class="flex flex-col w-[60%]">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <a href="{{ route('profile.create') }}" class="self-start">
                        <button type="button"
                            class="inline-block rounded border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-800 hover:text-white"
                            data-te-ripple-init>
                            <span class="font-bold">Adicionar</span>
                        </button>
                    </a>
                    <div class="overflow-hidden mt-10">
                        @if (!$users->isEmpty())
                            <h3 class="font-bold text-center">Lista de usuários</h3>
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b uppercase font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nome</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-bold">{{ $user->name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-bold">{{ $user->email }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="flex flex-row justify-around">
                                                    <a href="{{ route('profile.edit', $user->id) }}">
                                                        <button type="button"
                                                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                                            Editar
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('profile.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="delete-btn inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                                            Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
