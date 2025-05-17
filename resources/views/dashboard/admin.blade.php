<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="d-flex min-vh-100">
        @include('layout.navbar')

        <div class="flex-grow-1 p-4">
            {{-- Menu profil --}}
            <div class="d-flex justify-content-end align-items-center mb-4 me-3">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-900 focus:outline-none">
                                {{ Auth::user()->name ?? Auth::user()->email }}

                                
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="container">
                <div class="text-center mb-5">
                    <h1 class="display-6">Selamat Datang!</h1>
                    <p class="lead">Di Dashboard Admin</p>
                </div>

                @php
                    $cards = [
                        ['label' => 'Draft Surat', 'value' => $totalDraft],
                        ['label' => 'Surat Disetujui', 'value' => $totalApproved],
                        ['label' => 'Surat Terkirim', 'value' => $totalSent],
                        ['label' => 'Proyek Baru', 'value' => $totalProjectNew],
                        ['label' => 'Proyek Berjalan', 'value' => $totalProjectRunning],
                        ['label' => 'Proyek Selesai', 'value' => $totalProjectDone],
                    ];
                @endphp

                <div class="row">
                    @foreach($cards as $card)
                        <div class="col-md-4 mb-4">
                            <div class="border p-4 rounded text-center shadow-sm bg-light h-100 d-flex flex-column justify-content-center">
                                <span style="font-size: 28px;" class="fw-bold">{{ $card['value'] }}</span>
                                <span class="mt-2">{{ $card['label'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
