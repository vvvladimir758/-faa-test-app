<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserTransaction;

class user_trs_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user_trs_list {user}';

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
       $trs = UserTransaction::where('id', $this->argument('user'))->get();
       
       $this->info("Транзакции пользователя ".$this->argument('user'));
       $this->newLine(3);
       $this->info('тип'."|".'сумма'."|".'дата');
       $this->newLine(1);
       
       foreach($trs as $tr){
       $this->info($tr->type."|".$tr->amount."|".$tr->created_at);
       $this->newLine(1);
       }
       
       
    }
}
