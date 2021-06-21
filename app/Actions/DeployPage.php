<?php

namespace App\Actions;

use App\Concerns\EstablishesConnections;
use App\Models\Page;
use League\Flysystem\Filesystem;

class DeployPage
{
    use EstablishesConnections;

    public function deploy(Page $page)
    {
        $filesystem = $this->createFilesystem($page);

        $filesystem->createDir($page->slug);

        $html = view('pages.show', [
            'content' => $page->content,
            'link' => $page->affiliate_link,
            'button_text' => $page->template->button_text,
            'custom_code' => $page->connection->custom_code
        ])->render();

        $filesystem->put($page->slug . '/index.php', $html);
    }

    public function delete(Page $page)
    {
        $filesystem = $this->createFilesystem($page);

        $filesystem->deleteDir($page->slug);
    }

    protected function createFilesystem(Page $page): Filesystem
    {
        return new Filesystem($this->createAdapter($page->connection));
    }
}
