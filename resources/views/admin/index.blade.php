@extends('components.admin.main')
@section('main')
    <div class="w-full flex flex-col p-[50px]">
        @if ($data != '')
            <div class="w-full flex flex-col sm:flex-row justify-center">
                @if ($data['totalUsers'])
                    <div class="w-full sm:w-[50%] md:w-[35%] xl:w-[30%] m-[5px] p-5 border border-[#7f7f7fc9] ">
                        <div class="flex flex-col items-center w-full">
                            <span class="font-bold text-7xl">{{ $data['totalUsers'] }}</span>
                            <span class="font-semibold text-3xl">Total de Usuários</span>
                        </div>
                    </div>
                @endif
                @if ($data['browsers'])
                    <div class="w-full h-min sm:w-[50%] md:w-[35%] xl:w-[30%] m-[5px] border border-[#7f7f7fc9]">
                        <table class="w-full text-sm text-left rtl:text-right font-semibold">
                            <thead class="text-xs uppercase text-white bg-[#6a6a6a]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Browser</th>
                                    <th scope="col" class="px-6 py-3">Total Usuários</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['browsers'] as $browser)
                                    <tr class="even:bg-[#9c9c9c]">
                                        <td class="px-6 py-1">{{ $browser['browser'] }}</td>
                                        <td class="px-6 py-1">{{ $browser['screenPageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($data['operatingSystems'])
                    <div class="w-full h-min sm:w-[50%] md:w-[35%] xl:w-[30%] m-[5px] border border-[#7f7f7fc9]">
                        <table class="w-full text-sm text-left rtl:text-right font-semibold">
                            <thead class="text-xs uppercase text-white bg-[#6a6a6a]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Sistema</th>
                                    <th scope="col" class="px-6 py-3">Page Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['operatingSystems'] as $system)
                                    <tr class="even:bg-[#9c9c9c]">
                                        <td class="px-6 py-1">{{ $system['operatingSystem'] }}</td>
                                        <td class="px-6 py-1">{{ $system['screenPageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="w-full flex flex-col sm:flex-row justify-center">
                @if ($data['citiesCountries'])
                    <div class="w-full sm:w-[60%] md:w-[45%] m-[5px] border border-[#7f7f7fc9]">
                        <table class="w-full text-sm text-left rtl:text-right font-semibold">
                            <thead class="text-xs uppercase text-white bg-[#6a6a6a]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">País</th>
                                    <th scope="col" class="px-6 py-3">Cidade</th>
                                    <th scope="col" class="px-6 py-3">Total Usuários</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['citiesCountries'] as $cityCountry)
                                    <tr class="even:bg-[#9c9c9c]">
                                        <td class="px-6 py-1">{{ $cityCountry['country'] }}</td>
                                        <td class="px-6 py-1">{{ $cityCountry['city'] }}</td>
                                        <td class="px-6 py-1">{{ $cityCountry['totalUsers'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($data['events'])
                    <div class="w-full h-min sm:w-[60%] md:w-[45%] m-[5px] border border-[#7f7f7fc9]">
                        <table class="w-full text-sm text-left rtl:text-right font-semibold">
                            <thead class="text-xs uppercase text-white bg-[#6a6a6a]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Evento</th>
                                    <th scope="col" class="px-6 py-3">Total Usuários</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['events'] as $event)
                                    <tr class="even:bg-[#9c9c9c]">
                                        <td class="px-6 py-1">{{ $event['eventName'] }}</td>
                                        <td class="px-6 py-1">{{ $event['totalUsers'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @else
            <h2 class=" text-lg font-bold text-center">Nenhum dado para exibir...</h3>
        @endif
    </div>
@endsection
