<?php

namespace App\Filament\Widgets;

use App\Models\Peminjaman;
use Filament\Widgets\ChartWidget;

class PeminjamanSubmitted extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static bool $isLazy = false;
    public function getColumnSpan(): int | string | array
    {
        return 'full'; // agar memenuhi seluruh grid container
    }
    protected static ?string $maxHeight = '300px';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $data = Peminjaman::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

        // Inisialisasi array data 12 bulan
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $data[$i] ?? 0; // isi 0 jika bulan tersebut tidak ada data
        }

        return [
            'datasets' => [
                [
                    'label' => 'Peminjaman Submitted',
                    'data' => $monthlyData,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
