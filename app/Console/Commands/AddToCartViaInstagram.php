<?php

namespace App\Console\Commands;

use App\CustomClasses\InstagramAPI;
use Illuminate\Console\Command;

class AddToCartViaInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addtocart:comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaning Instagram Comments in order to add cart';

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
     * @return mixed
     */
    public function handle()
    {
        $instagram = new InstagramAPI();
        foreach(\App\Supplier::all() as $supplier){
            $instagram->setAccessToken($supplier->instagramAccount->access_token);
            foreach($supplier->products()->where('is_active',true)->get() as $product){
                $comments=$instagram->getMediaComments($product->instagram->id);

                if($comments->meta->code==200){
                    $lastScannedComment=null;
                    for($i=count($comments->data)-1; $i>=0 ; $i-- ){
                        $comment=$comments->data[$i];
                        if($lastScannedComment==null){
                            $lastScannedComment=$comment->id;
                        }

                        if($product->instagram->last_scanned_comment>=$comment->id){
                            break;
                        };
                        if (strpos(mb_strtolower($comment->text, 'UTF-8'),'sepete at') !== false){
                            if($customer=\App\InstagramAccount::where('instagram_id',$comment->from->id)->first()){
                                if($customer->isCustomer()){
                                    $customer=$customer->instagramable;
                                    \App\WishedProduct::create(['customer_id'=>$customer->id,'product_id'=>$product->id,'count'=>1]);
                                }
                            }
                        }



                    }
                    if($lastScannedComment!=null){
                        $productInstagram=$product->instagram;
                        $productInstagram->last_scanned_comment=$lastScannedComment;
                        $productInstagram->update();
                    }
                }

            }
        }
    }
}
