<?php

namespace App\Console\Commands;

use App\Contracts\Repository\ProductRepository;
use App\Models\Product;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'you can create product with this command.';

    public function __construct(public ProductRepository $productRepository)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $title = $this->ask('Enter product title:');

        if (filled($this->productRepository->findByTitle($title))) {
            $this->warn("Product `{$title}` already exist.");
            return;
        }
        /** @var Product $product */
        $this->productRepository->create([
            'title' => $title
        ]);

        $this->info("Product `{$title}` has been created.");
    }
}
