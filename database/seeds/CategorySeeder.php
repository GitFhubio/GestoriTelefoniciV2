<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [ ['nome'=>'ADSL','descrizione'=>'La notevole ampiezza di banda fornita dall\'ADSL consente di accedere con maggiore rapidità alle caratteristiche multimediali dei siti web, come I video-clip, le animazioni e l\'audio di alta qualità. Ciò incrementa in maniera significativa l\'esperienza della navigazione online. Dal punto di vista della produttività aziendale, l\'accesso rapido all\'Intranet renderebbe il telelavoro una scelta interessante, apportando in tal modo vantaggi sia per il lavoratore sia per la società. Un altro utilizzo interessante dell\'ADSL è relato all\'Internet Tv ed ai servizi ad essa correlati.Trova l\'offerta che fa al caso suo.'],
        ['nome'=>'Fibra','descrizione'=>'La Fibra Ottica, o per meglio dire il cavo in Fibra Ottica, è una tecnologia di trasmissione dei dati che ti permette di raggiungere alte velocità quando navighi su internet. È una delle tecnologie disponibili per avere una connessione internet a casa o in ufficio in alternativa al cavo in rame dell\'ADSL.Ormai tutti i principali operatori telefonici italiani propongono offerte Fibra Ottica per navigare fino a 1 Giga in download, in base alla copertura raggiunta dal servizio nella tua zona di residenza. Con il nostro comparatore puoi confrontare le offerte Fibra Ottica più convenienti e farti così un’idea dei prezzi, per poi attivare quella che fa più al caso tuo.'],
        ['nome'=>'5G','descrizione'=>'5G rappresenta la quinta generazione della tecnologia cellulare. È stato progettato per incrementare la velocità, ridurre la latenza e migliorare la flessibilità dei servizi wireless. La tecnologia 5G ha una velocità di picco teorica di 20 Gbps, mentre la velocità di picco di 4G è solo 1 Gbps.5G promette inoltre una latenza inferiore, il che può migliorare le prestazioni delle applicazioni aziendali, oltre a quelle di altre esperienze digitali.Che aspetti?Passa anche tu al 5G.'],
        ['nome'=>'Mobile','descrizione'=>'La comunicazione mobile è, si sa, in continua evoluzione, tanto che nel corso di pochi decenni si sono avvicendate varie generazioni di dispositivi e reti compatibili con i nuovi standard di telecomunicazione.Scopri le offerte mobile più adatte a te!'],
        ['nome'=>'Estero','descrizione'=>'Qui trovi le offerte per comunicare con il Mondo! Scopri quelle più adatte per le chiamate internazionali dall’Italia verso l’Estero. Con la nostra Top Quality Selection di offerte annulliamo le distanze tra le persone.']
        ];

        foreach ($categories as $category) {
            $newCategory=new Category();
            $newCategory->fill($category);
            $newCategory->save();
        }
    }
}


