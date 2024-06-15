<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Sales;
use Carbon\Carbon;
use Storage;

class GenerateDailySalesSummary extends Command
{
    protected $signature = 'sales:summary';
    protected $description = 'Generate daily sales summary';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $date = Carbon::now();
        $sales = Sales::whereDate('date', $date)->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $row = 1;
        $sheet->mergeCells('A' . $row . ':E' . $row);
        $sheet->setCellValue('A' . $row, 'Sales Summary for ' . $date->toFormattedDateString());
        $sheet->getStyle('A' . $row)->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $row++;
        $sheet->setCellValue('A' . $row, 'Order ID');
        $sheet->setCellValue('B' . $row, 'Bedrag');
        $row++;
        foreach ($sales as $sale) {
            $sheet->setCellValue('A' . $row, $sale->id);
            $sheet->setCellValue('B' . $row, $sale->getTotalAmount());
            $row++;
        }
        $sheet->setCellValue('A' . $row, 'Totaal:');
        $sheet->setCellValue('B' . $row, '=SUM(B3:B' . ($row - 1) . ')');

        $writer = new Xlsx($spreadsheet);
        $fileName = 'daily_sales_summary_' . $date->format('Y-m-d') . '.xlsx';
        $directory = storage_path('app/public/summaries');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filePath = $directory . '/' . $fileName;

        $writer->save($filePath);

        $this->info('Sales summary generated successfully.');
    }
}
