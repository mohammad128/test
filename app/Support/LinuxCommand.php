<?php

namespace App\Support;

use App\Contracts\CommentHandler;

class LinuxCommand implements CommentHandler
{
    protected string $file;

    public function __construct()
    {
        $this->file = config('settings.parspack.file_dir', '/opt/myprogram/product_comments');
        if( ! $this->fileIsExist($this->file) )
            $this->createFile($this->file);
    }

    public function plusCommentCount(string $productTitle): void
    {
        $result = $this->searchInFile($this->file, "{$productTitle}: ");
        if(! $result ) {
            exec("echo '{$productTitle}: 1' >> ".$this->file);
        }
        else {
            $count = ((int)explode(': ', $result)[1])+1;
            exec("sed -i 's/{$productTitle}:.*/{$productTitle}: {$count}/g' ".$this->file);
        }
    }

    public function fileIsExist(string $file): bool
    {
        return (bool)exec('
            if [ -f ' . $file . ' ]; then
                echo 1
            else
                echo 0
            fi'
        );
    }

    public function searchInFile(string $file, string $search): bool|string
    {
        return exec("grep -r {$file} -e '{$search}'");
    }

    public function createFile(string $file): void
    {
        exec('touch '.$file);
    }

}
