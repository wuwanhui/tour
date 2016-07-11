<?php

namespace App\Console\Commands;

use Faker\Provider\zh_CN\DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class InstallArtisan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tour:install {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '安装命令';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call("migrate");
        $this->call("db:seed");
        $name = $this->argument('name');
        if ($name == null) {
            $name = "元佑旅游管理平台";
        }
        $this->info("安装”" + $name + "”成功");
        Storage::disk('local')->put('install.loch', DateTime::dateTime()->format('yyyy-MM-hh'));
        // Storage::put('/install.loch', DateTime::dateTime()->format('yyyy-MM-hh'));
//        if ($this->confirm('确认重新安装”' + $name + '“?[y|n]')) {
//            $this->info("安装”" + $name + "”成功");
//        } else {
//            $this->error("安装”" + $name + "”失败");
//        }
    }
}
