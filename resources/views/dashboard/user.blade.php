<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar/Navbar --}}
        @include('layout.navbar') <!-- Pastikan file layout/navbar.blade.php tersedia -->

        <div class="flex-grow-1 p-3 m-2">
            <div class="mx-auto my-5 row col-9">
                <div class="col-md-12 text-center mt-3">
                    <h1 class="display-6">Selamat Datang!</h1>
                    <p class="lead">Di Dashboard User</p>
                </div>

                {{-- Card Statistik --}}
                <div class="row mt-5">
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

                    @foreach($cards as $card)
                        <div class="col-md-4 mb-4">
                            <div class="border p-4 rounded text-center shadow-sm bg-light">
                                <span style="font-size: 24px;" class="fw-bold">{{ $card['value'] }}</span><br>
                                <span>{{ $card['label'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
