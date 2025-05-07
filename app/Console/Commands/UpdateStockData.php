<?php

namespace App\Console\Commands;

use App\Models\WatchlistStock;
use App\Services\StockService;
use Illuminate\Console\Command;

class UpdateStockData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stocks:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update stock data for all watched stocks';

    protected $stockService;

    public function __construct(StockService $stockService)
    {
        parent::__construct();
        $this->stockService = $stockService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting stock data update...');

        $symbols = WatchlistStock::select('symbol')
            ->distinct()
            ->pluck('symbol');

        $bar = $this->output->createProgressBar(count($symbols));
        $bar->start();

        foreach ($symbols as $symbol) {
            try {
                $this->stockService->getDailyData($symbol);
                $bar->advance();
            } catch (\Exception $e) {
                $this->error("Error updating {$symbol}: " . $e->getMessage());
            }
        }

        $bar->finish();
        $this->newLine();
        $this->info('Stock data update completed!');
    }
}
