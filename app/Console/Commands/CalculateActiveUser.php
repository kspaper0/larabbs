<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CalculateActiveUser extends Command
{
    // 供我们调用命令
    protected $signature = 'larabbs:calculate-active-user';

    // 命令的描述
    protected $description = 'Generating Active Users';

    // 最终执行的方法
    public function handle(User $user)
    {
        // 在命令行打印一行信息
        $this->info("Calculating...");

        $user->calculateAndCacheActiveUsers();

        $this->info("Generated Successfully");
    }
}