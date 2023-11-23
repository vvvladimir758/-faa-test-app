<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Console\Command;

class balance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'balance {user}{amount}{--repl}{--debt} ';

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
        
        if(!$this->option('repl') && !$this->option('debt'))
            return $this->info(' !!! укажите тип операции --repl или --debt');
        
        if($this->option('repl') && $this->option('debt'))
            return $this->info(' !!! укажите только один тип операции --repl или --debt');
        
            $user = User::where('id',$this->argument('user'))->first();
            //dd($user);
            if($this->option('repl'))
            {
                $user->balance+=$this->argument('amount');
                $type = 'repl';
                $msg = "Баланс пополнен, теукщий баланс : ".$user->balance;
            }
            else{
                    $user->balance-=$this->argument('amount');   
                    $type='debt';
                    $msg = "C баланса списанна сумма , теукщий баланс : ".$user->balance;
                }
            
            $user->save();
            
            UserTransaction::create([
                'amount'  =>$this->argument('amount'),
                'type'    =>$type,
                'user_id' =>$this->argument('user')
                ]);
                

        $this->info($msg);
    }
}
