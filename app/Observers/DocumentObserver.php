<?php

namespace App\Observers;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;

class DocumentObserver
{
    /**
     * Handle the Document "created" event.
     */
    public function creating(Document $document): void
    {
        $tesseract = new TesseractOCR(storage_path('app/public/' . $document->select));

        $tesseract = $tesseract->run();

        $document->name = $tesseract;

        Storage::move('public/' . $document->archive, 'public/' . $document->name . '.png');
        $document->archive = $document->name . '.png';
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
