<?php

namespace App\Console\Commands;

use App\Dto\CarDto;
use App\Dto\WashingDto;
use App\Services\Crud\CarCrudService;
use App\Services\Crud\WashingCrudService;
use Illuminate\Console\Command;

class SetCarNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-number:insert {numbers} {zones}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private CarCrudService $carCrudService, private WashingCrudService $washingCrudService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $numbers = json_decode($this->argument('numbers'), true);
        $zones = json_decode($this->argument('zones'), true);
        foreach ($numbers as $key => $value) {
            $zone = $zones[0] ?? 'ru';
            if (!$this->carCrudService->exists(number:$value, zone:$zone)) {
                $car = $this->carCrudService->create(new CarDto(['number' => $value, 'zone' => $zone]));
            }else{
                $car = $this->carCrudService->findByNumber($value);
            }
            $this->washingCrudService->create(new WashingDto(['car_id' => $car->id]));
        }

        return 0;
    }

}
