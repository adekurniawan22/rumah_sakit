<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    private $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isPhpEnabled', true); // Mengaktifkan evaluasi PHP dalam HTML
        $this->dompdf = new Dompdf($options);
    }

    public function generate($html, $filename = 'document', $paper = 'A4', $orientation = 'portrait', $stream = true)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        if ($stream) {
            $this->dompdf->stream($filename . '.pdf', ['Attachment' => 0]);
        } else {
            return $this->dompdf->output();
        }
    }
}
