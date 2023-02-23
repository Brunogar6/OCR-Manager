<?php

namespace App\Observers;

use App\Models\Document;
use thiagoalessio\TesseractOCR\TesseractOCR;

class DocumentObserver
{
    /**
     * Handle the Document "created" event.
     */
    public function creating(Document $document): void
    {
        $tesseract = new TesseractOCR(storage_path('app/public/' . $document->image));

        $tesseract = $tesseract->run();

        $document->name = $tesseract;
    }

    /**
     * Handle the Document "updated" event.
     */
    public function updated(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "deleted" event.
     */
    public function deleted(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "restored" event.
     */
    public function restored(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "force deleted" event.
     */
    public function forceDeleted(Document $document): void
    {
        //
    }
}
