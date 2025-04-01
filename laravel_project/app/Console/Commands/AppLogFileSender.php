<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AppLogFileSender extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:log-file-sender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a log file to telegram chat.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $idChannel = env('TELEGRAM_CHANNEL_ID');
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $message = 'Not working';
        try {
            $response = Http::get('http://google.com')->status();
            $message = "Now status of website : " . $response;
            file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
         } catch (Exception $e) {
            Log::info($e->getMessage());
         } finally {
            file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
         }

        return 0;
    }
}
