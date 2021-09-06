<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\User\BirthdayNotification;

class SendBirthdayMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily birthday messages';

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
        User::birthdaysToday()->chunk(50, function($users){
            foreach($users as $user) {
                $user->notify(new BirthdayNotification());
            }
        });
        return 0;
    }
}
