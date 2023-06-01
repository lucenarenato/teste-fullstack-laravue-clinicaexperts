<?php

namespace App\Console\Commands;

use App\Models\AccessLog;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DomainLogDestroy extends Command
{
    protected $signature = 'domainLog:destroy';

    protected $description = 'Irá destruir todos os logs';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * handle - Tem como objetivo executar o comando para o objetivo desse comando descrito no description
     */
    public function handle()
    {
        AccessLog::truncate();;

        $this->info('Truncate feito');
    }
}
