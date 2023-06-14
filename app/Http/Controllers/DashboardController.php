<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $weeklyData = Blog::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE_FORMAT(created_at, "%W") as day, COUNT(*) as count')
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();

        // Inisialisasi data untuk semua hari dalam seminggu
        $weeklyDataAllDays = array_fill_keys($daysOfWeek, 0);

        // Menggabungkan data yang ada dengan data yang kosong
        $weeklyDataMerged = array_merge($weeklyDataAllDays, $weeklyData);

        // Mengurutkan data berdasarkan urutan hari dalam seminggu
        $weeklyDataSorted = array_intersect_key($weeklyDataMerged, array_flip($daysOfWeek));

        // Ubah nama hari menjadi bahasa Indonesia
        foreach ($weeklyDataSorted as $day => $count) {
            $carbonDay = Carbon::parse($day)->locale('id');
            $translatedDay = $carbonDay->translatedFormat('l');
            $weeklyDataSorted[$translatedDay] = $count;
            unset($weeklyDataSorted[$day]);
        }

        return view('dashboard.index', compact('weeklyDataSorted'));
    }    
}
