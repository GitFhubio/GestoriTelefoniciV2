<?php

use App\Lead;
use App\Note;
use App\User;
use App\Offer;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories =
        [ ['nome'=>'ADSL','descrizione'=>'La notevole ampiezza di banda fornita dall\'ADSL consente di accedere con maggiore rapidità alle caratteristiche multimediali dei siti web, come I video-clip, le animazioni e l\'audio di alta qualità. Ciò incrementa in maniera significativa l\'esperienza della navigazione online. Dal punto di vista della produttività aziendale, l\'accesso rapido all\'Intranet renderebbe il telelavoro una scelta interessante, apportando in tal modo vantaggi sia per il lavoratore sia per la società. Un altro utilizzo interessante dell\'ADSL è relato all\'Internet Tv ed ai servizi ad essa correlati.Trova l\'offerta che fa al caso suo.','img'=>'https://d11o8pt3cttu38.cloudfront.net/wp-content/uploads/sites/38/2020/09/adsl-fibra-differenze.jpg'],
        ['nome'=>'Fibra','descrizione'=>'La Fibra Ottica, o per meglio dire il cavo in Fibra Ottica, è una tecnologia di trasmissione dei dati che ti permette di raggiungere alte velocità quando navighi su internet. È una delle tecnologie disponibili per avere una connessione internet a casa o in ufficio in alternativa al cavo in rame dell\'ADSL.Ormai tutti i principali operatori telefonici italiani propongono offerte Fibra Ottica per navigare fino a 1 Giga in download, in base alla copertura raggiunta dal servizio nella tua zona di residenza. Con il nostro comparatore puoi confrontare le offerte Fibra Ottica più convenienti e farti così un’idea dei prezzi, per poi attivare quella che fa più al caso tuo.','img'=>'https://www.aranzulla.it/wp-content/contenuti/2018/07/fibraotticac.jpg'],
        ['nome'=>'5G','descrizione'=>'5G rappresenta la quinta generazione della tecnologia cellulare. È stato progettato per incrementare la velocità, ridurre la latenza e migliorare la flessibilità dei servizi wireless. La tecnologia 5G ha una velocità di picco teorica di 20 Gbps, mentre la velocità di picco di 4G è solo 1 Gbps.5G promette inoltre una latenza inferiore, il che può migliorare le prestazioni delle applicazioni aziendali, oltre a quelle di altre esperienze digitali.Che aspetti?Passa anche tu al 5G.','img'=>'https://www.donnamoderna.com/content/uploads/2019/08/5G.jpg'],
        ['nome'=>'Mobile','descrizione'=>'La comunicazione mobile è, si sa, in continua evoluzione, tanto che nel corso di pochi decenni si sono avvicendate varie generazioni di dispositivi e reti compatibili con i nuovi standard di telecomunicazione.Scopri le offerte mobile più adatte a te!','img'=>'https://qds.it/wp-content/uploads/2021/03/telefonia-mobile.jpg'],
        ['nome'=>'Estero','descrizione'=>'Qui trovi le offerte per comunicare con il Mondo! Scopri quelle più adatte per le chiamate internazionali dall’Italia verso l’Estero. Con la nostra Top Quality Selection di offerte annulliamo le distanze tra le persone.','img'=>'https://previews.123rf.com/images/usbfco/usbfco1208/usbfco120800116/14856743-world-map-concept-of-global-communication.jpg']
        ];

        foreach ($categories as $category) {
            $newCategory=new Category();
            $newCategory->fill($category);
            $newCategory->save();
        }

        $user1=new User();
        $user1->name='Admin';
        $user1->email='admin@outlook.it';
        $user1->password = Hash::make('beinformatica');
        $user1->save();
        $role1 = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit-users']);
        $role1->givePermissionTo($permission);
        $user1->assignRole($role1);

        $role2 = Role::create(['name' => 'operator']);

        $user2=new User();
        $user2->name='Tim';
        $user2->email='Tim@outlook.it';
        $user2->img='https://pbs.twimg.com/profile_images/687250413788106753/Of-4AHDY_400x400.png';
        $user2->password = Hash::make('beinformatica');
        $user2->backimg='https://www.gruppotim.it/content/dam/share/TIM-socialshare-210427.jpg';
        $user2->save();
        $user2->assignRole($role2);

        $user3=new User();
        $user3->name='Vodafone';
        $user3->email='vodafone@outlook.it';
        $user3->img='https://ilsalvagente.it/wp-content/uploads/2016/03/vodafone-696x459.jpg';
        $user3->password = Hash::make('beinformatica');
        $user3->backimg='http://avmtel.com/wp/wp-content/uploads/2018/12/banner-vodafone-dec18.jpg';
        $user3->save();
        $user3->assignRole($role2);

        $user4=new User();
        $user4->name='windtre';
        $user4->email='windtre@outlook.it';
        $user4->img='https://wips.plug.it/cips/tecnologia/cms/2020/03/wind-tre.jpg';
        $user4->password = Hash::make('beinformatica');
        $user4->backimg='https://d1qsjop7tycsfb.cloudfront.net/fileadmin/mainbrand/secondary-banner/condizioni-utilizzo_secondary_banner_desktop.jpg';
        $user4->save();
        $user4->assignRole($role2);

            $newOffer1= new Offer;
            $newOffer1->name= 'TIM SUPER FIBRA';
            $newOffer1->costo_mensile = 29.90;
            $newOffer1->descrizione ='Fibra fino a 1 Giga Modem TIM HUB + Chiamate Illimitate SOLO ONLINE.AGGIUNGI TIMVISION E HAI DAZN CON TUTTA LA SERIE A TIM E INFINITY+
            CON LA UEFA CHAMPIONS LEAGUE';
            $newOffer1->data_inizio = '2021-06-01';
            $newOffer1->data_fine= '2021-08-31';
            $newOffer1->user_id = 2;
            $newOffer1->save();
            $newOffer1->categories()->attach(2);
            $newOffer3= new Offer;
            $newOffer3->name= 'TIM SUPER FIBRA con TIM UNICA';
            $newOffer3->costo_mensile = 29.90;
            $newOffer3->descrizione ='Wi-Fi ultraveloce, nuovo Modem TIM HUB+ e Chiamate illimitate. I primi 2 mesi te li regala TIM-Fibra fino a 1 GIGA.Modem TIM HUB+.Chiamate illimitate verso tutti.SOLO ONLINE.GIGA ILLIMITATI per te e la tua famiglia..';
            $newOffer3->data_inizio = '2021-07-01';
            $newOffer3->data_fine= '2021-10-31';
            $newOffer3->user_id = 2;
            $newOffer3->save();
            $newOffer3->categories()->attach(2);
            $newOffer3->categories()->attach(4);

            $newOffer4= new Offer;
            $newOffer4->name= 'INFINITO';
            $newOffer4->costo_mensile = 24.99;
            $newOffer4->descrizione ='Spedizione gratuita a casa tua.Giga, minuti e SMS illimitati,velocità 2Mbps+ INFO,minuti verso UE illimitati,1000 Minuti verso extra UE,1 Giga di roaming extra UE + 200 minuti,Top service incluso + INFO';
            $newOffer4->data_inizio = '2021-07-01';
            $newOffer4->data_fine= '2021-10-31';
            $newOffer4->user_id = 3;
            $newOffer4->save();
            $newOffer4->categories()->attach(3);
            $newOffer4->categories()->attach(4);
            $newOffer4->categories()->attach(5);

            $newOffer7= new Offer;
            $newOffer7->name= 'UNLIMITED 5G';
            $newOffer7->costo_mensile = 29.99;
            $newOffer7->descrizione ='Unlimited 5G con Easy Pay, GIGA illimitati con 5G Priority Pass,Call Center senza attese,200 Minuti verso l\'Estero, Minuti illimitati e 200 SMS';
            $newOffer7->data_inizio = '2021-05-01';
            $newOffer7->data_fine= '2021-12-31';
            $newOffer7->user_id = 4;
            $newOffer7->save();
            $newOffer7->categories()->attach(3);
            $newOffer7->categories()->attach(4);

            $newOffer2= new Offer;
            $newOffer2->name= 'TIM SUPER FIBRA con Offerta Mobile';
            $newOffer2->costo_mensile = 39.90;
            $newOffer2->descrizione ='TIM SUPER FIBRAFibra + OFFERTA MOBILE
            Scegli l\'offerta con il meglio della rete fissa e mobile di TIM: per te una SIM gratuita.Per la tua casa: Fibra, Modem TIM HUB+ e Chiamate Illimitate
            I PRIMI 2 MESI IN REGALO.Per il tuo smartphone: Minuti e SMS illimitati, GIGA illimitati con TIM UNICA,Nessun costo per la SIM.PROMO SOLO ONLINE';
            $newOffer2->data_inizio = '2021-04-01';
            $newOffer2->data_fine= '2021-07-31';
            $newOffer2->user_id = 2;
            $newOffer2->save();
            $newOffer2->categories()->attach(2);
            $newOffer2->categories()->attach(4);

            $newOffer10= new Offer;
            $newOffer10->name= 'TIM SUPER ADSL';
            $newOffer10->costo_mensile = 24.90;
            $newOffer10->descrizione ='Internet senza limiti in ADSL con velocità fino a 20 Mbps;Modem fibra incluso;Chiamate illimitate verso fissi e cellulari nazionali;TIM Vision;Attivazione inclusa. ';
            $newOffer10->data_inizio = '2021-04-01';
            $newOffer10->data_fine= '2021-07-31';
            $newOffer10->user_id = 2;
            $newOffer10->save();
            $newOffer10->categories()->attach(1);

            $newOffer8= new Offer;
            $newOffer8->name= 'Super Fibra';
            $newOffer8->costo_mensile = 24.99;
            $newOffer8->descrizione ='Fibra fino a 1 Gigabit
            Modem Wi-Fi 6 incluso,Inclusi 12 mesi di Amazon Prime,Senza costi di attivazione';
            $newOffer8->data_inizio = '2021-06-01';
            $newOffer8->data_fine= '2021-11-30';
            $newOffer8->user_id = 4;
            $newOffer8->save();
            $newOffer8->categories()->attach(2);

            $newOffer9= new Offer;
            $newOffer9->name= 'YOUNG 5G';
            $newOffer9->costo_mensile = 11.99;
            $newOffer9->descrizione ='Giga illimitati in 5G sulle tue App,80 GIGA da usare come vuoi,Minuti e SMS illimitati';
            $newOffer9->data_inizio = '2021-07-01';
            $newOffer9->data_fine= '2021-10-31';
            $newOffer9->user_id = 4;
            $newOffer9->save();
            $newOffer9->categories()->attach(2);
            $newOffer9->categories()->attach(3);

            $newOffer6= new Offer;
            $newOffer6->name= 'SPECIAL MINUTI 50 GIGA';
            $newOffer6->costo_mensile = 29.90;
            $newOffer6->descrizione ='GIGA MINUTI E SMS,50 Giga + minuti illimitati : MINUTI VERSO UE, MINUTI VERSO EXTRA UE, ROAMING EXTRA UE';
            $newOffer6->data_inizio = '2021-07-01';
            $newOffer6->data_fine= '2021-10-31';
            $newOffer6->user_id = 3;
            $newOffer6->save();
            $newOffer6->categories()->attach(4);
            $newOffer6->categories()->attach(5);

            $newOffer5= new Offer;
            $newOffer5->name= 'Vodafone Family Plan';
            $newOffer5->costo_mensile = 39.90;
            $newOffer5->descrizione ='Internet fino a 2.5 Gigabit/s.Modem Wifi 6 con Wi-Fi Optimizer.Chiamate da telefono fisso.SIM 5G per il tuo smartphone.con giga, minuti e SMS illimitati.In più puoi aggiungere Vodafone TV Sport Plus e NOW Sport o Vodafone TV Intrattenimento e NOW Entertainment con uno sconto sulla rete fissa per i primi 12 mesi';
            $newOffer5->data_inizio = '2021-08-01';
            $newOffer5->data_fine= '2021-10-31';
            $newOffer5->user_id = 3;
            $newOffer5->save();
            $newOffer5->categories()->attach(2);
            $newOffer5->categories()->attach(3);

            $status = ['da gestire','non ok','ok'];

     for ($i=0; $i < 20; $i++) {

         $newLead = new Lead;
         $newLead->nome = $faker->name();
         $newLead->cognome = $faker->lastName();
         $newLead->email = $faker->email();
         $newLead->telefono= $faker->numerify('3#########');
         $newLead->status = $status[array_rand($status, 1)];
         $newLead->offer_id =rand(1,10);
         $newLead->save();
     }
     for ($i=0; $i < 20; $i++) {
         $newNote =new Note();
         $newNote->lead_id =rand(1,20);
         $newNote->messaggio =$faker->sentence();
         $newNote->save();
     }
    }
}
