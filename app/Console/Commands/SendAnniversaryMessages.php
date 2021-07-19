<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\User\AnniversaryNotification;

class SendAnniversaryMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anniversary:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends daily anniversary messages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
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
        User::anniversariesToday()->chunk(50, function($users){
            foreach($users as $user) {
                $user->notify(new AnniversaryNotification());
            }
        });
        return 0;
    }
}
