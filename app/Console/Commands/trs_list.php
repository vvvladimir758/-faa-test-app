<?php

namespace App\Console\Commands;

use App\Models\UserTransaction;
use Illuminate\Console\Command;

class trs_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trs_list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trs = UserTransaction::all();
        
        $this->info("Транзакции пользователей ");
        $this->newLine(3);
        $this->info("ползователь //".'тип'."|".'сумма'."|".'дата');
        $this->newLine(1);
        
        foreach($trs as $tr){
            $this->info($tr->user_id." //".$tr->type."|".$tr->amount."|".$tr->created_at);
            $this->newLine(1);
        }
        
    }
}
