<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearLoginAttempts extends Command
{
    protected $signature = 'auth:clear-attempts';
    protected $description = 'Clear login attempts from the session';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Clear login attempts from the session
        session()->forget('login_attempts');
        $this->info('Login attempts cleared.');
    }
}
