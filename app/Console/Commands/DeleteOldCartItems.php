<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CartItme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DeleteOldCartItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
       protected $signature = 'cart:cleanup-old-items';
    protected $description = 'حذف المنتجات من السلة بعد ساعتين من عدم إتمام الشراء';
    /**
     * Execute the console command.
     */
    public function handle()
    {
           $threshold = Carbon::now()->subHours(2);

        $deleted = CartItme::where('created_at', '<', $threshold)->delete();

        $this->info("تم حذف {$deleted} منتج/منتجات من السلال غير المكتملة.");
        //
       Log::info("🕒 تمت جدولة الحذف تلقائيًا");
    }
}
