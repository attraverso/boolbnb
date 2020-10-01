<?php

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Get collection of 'id' from users table
        // $users = User::all()->pluck('id')->toArray();
        // for ($i=0; $i < 10; $i++) { 
        //     $seed = new House();
        //     $seed->user_id = $faker->randomElement($users);
        //     $seed->title = $faker->sentence(5);
        //     $seed->nr_of_rooms = $faker->randomDigitNot(0);
        //     $seed->nr_of_beds = $faker->randomDigitNot(0);
        //     $seed->nr_of_bathrooms = $faker->randomDigitNot(0);
        //     $seed->square_mt = $faker->randomNumber(2);
        //     $seed->address = $faker->address;
        //     $seed->latitude = $faker->latitude;
        //     $seed->longitude = $faker->longitude;
        //     $seed->image_path = $faker->imageUrl;
        //     $seed->visible = $faker->boolean;
		// 	$seed->advertised = $faker->boolean;
		// 	$seed->description = $faker->sentence(50);
        //     $seed->save();
        // }

        $houses = [
            [   
                'title' => 'Beautiful Loft',
                'address' => 'Via San Maurilio, 23, 20123 Milan',
                'nr_of_rooms' => 4,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 2,
                'square_mt' => 30,
                'latitude' => '45.46273',
                'longitude' => '9.18262',
                'description' => 'Stanza matrimoniale in appartamento luminoso al 4 piano, il costo include colazione e biancheria per il bagno.
                Vicinanza mezzi bus metro',
                'image_path' => '/uploads/apartment-1.jpg',
                'visible' => 0,
                'advertised' => 1,
            ],
            [   
                'title' => 'Ottimo',
                'address' => 'Via Valfurva, 2, 20162 Milan',
                'nr_of_rooms' => 6,
                'nr_of_beds' => 3,
                'nr_of_bathrooms' => 2,
                'square_mt' => 60,
                'latitude' => '45.50805',
                'longitude' => '9.19551',
                'description' => "Underground stop: 5 min. walk from Sant'Agostino station (green line). Walking distance from Duomo: 15 minutes. Private access. Private terrace. Terrific view over the Duomo, San Lorenzo, Sant'Eustorgio, Torre Velasca. Very close to lovely day/night life: bars for breakfast/aperitivi, restaurant (italian, japanese, diners).Very close to nice shopping area.",
                'image_path' => '/uploads/apartment-3.jpg',
                'visible' => 1,
                'advertised' => 0,
                
            ],
            [
                'title' => 'MARINA - 30 meters from Central Station',
                'address' => 'Via Ciro Menotti, 4, 20129 Milan',
                'nr_of_rooms' => 3,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 45.5,
                'latitude' => '45.46886',
                'longitude' => '9.21342',
                'description' => 'Modern, vintage style loft, just a few meters away from Bovisa (x RHO FIERA 10 minutes, mxp 25 minutes, center 15 minutes, central station 15 minutes) very quiet area, 2 double bedrooms, bathroom with a tub and all the comforts, you will feel right at home, at every moment.',
                'image_path' => '/uploads/apartment-2.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Apartment with balcony near city centre',
                'address' => 'Viale Renato Serra, 14, 20148 Milan',
                'nr_of_rooms' => 5,
                'nr_of_beds' => 3,
                'nr_of_bathrooms' => 2,
                'square_mt' => 58,
                'latitude' => '45.48479',
                'longitude' => '9.14409',
                'description' => 'The property is located 30 meters from the central station main entrance and close to 2 metro line stops which connect the apartment with Duomo in 10 minutes and with NAVIGLI district in 20 minutes. The apartment consists of small living room with kitchen, a double bedroom and bathroom - bed linens and towels provided for every guest. The kitchen is fully equipped and makes you feel as if you were home',
                'image_path' => '/uploads/apartment-5.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Single room, included breakfast :)',
                'address' => 'Via Alserio, 1, 20159 Milan',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 35,
                'latitude' => '45.49147',
                'longitude' => '9.18439',
                'description' => "My apartment is close to Niguarda Hospital. You'll love my apartment for these reasons: Clean and tidy, in a young environment !!.Nearby are shops (supermarket 100 mt, bar, etc) and parks. Connected to the Central Station (bus 42/15 min), City Centre (tram 4/25 min), Metro: M3 (tram 4/10 min), M5 (bus 52/5 min), M1 (bus51/10 min),Bicocca University (bus 52/5 min). We speak Italian, English and Spanish. The apartment is suitable for solo travelers and business travelers :)",
                'image_path' => '/uploads/apartment-4.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Clean cozy room with private balcony for women',
                'address' => 'Via Giuseppe Giusti, 5, 20900 Monza',
                'nr_of_rooms' => 3,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 1,
                'square_mt' => 39,
                'latitude' => '45.58964',
                'longitude' => '9.26198',
                'description' => 'Please before confirm your reservation ask me about the availability, i will response to your messages within couple minutes. The location is well connected to everywhere by public transportation 2 minutes by walk to bus station 5 minutes by walk to metro station 2 minutes by walk to pharmacy , supermarkets , restaurants , coffeeshop , post office ,... It has washing machine, refrigerator, induction plate and all equipments for cooking, dish washer, toaster, microwave , iron, hairdryer, etc.',
                'image_path' => '/uploads/apartment-6.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Cozy Apartment, in between Milano, Como & Lecco',
                'address' => 'Via Antonio Fogazzaro, 1, 20900 Monza',
                'nr_of_rooms' => 6,
                'nr_of_beds' => 3,
                'nr_of_bathrooms' => 3,
                'square_mt' => 47,
                'latitude' => '45.58220',
                'longitude' => '9.29115',
                'description' => 'Cozy Apartment just renovated and refurbished with natural materials and a nordic style. It is located 5 minutes from Monza-Circuit F1 (Autodromo Nazionale Monza), but also in between Milano, Como and Lecco. The Monza Park is the largest fenced park in Europe and it is situated 5 minutes by walk from the apartment.You will have a private garage for your car. ',
                'image_path' => '/uploads/apartment-6.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Studio Flat apartment with private parking',
                'address' => 'Viale Elvezia, 14, 20900 Monza',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 30,
                'latitude' => '45.59260',
                'longitude' => '9.25302',
                'description' => 'This is a bright studio apartment, with free private parking. At a 7 minute walk from the M1 metro station. The apartment has a kitchen, bathroom, shower and washing machine. There is a mall, supermarkets and great events and food options within 10 minutes of walking. The bed is a sofa-bed for two people.',
                'image_path' => '/uploads/house-1.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Renovated 1bdr',
                'address' => 'Via Giuseppe Sirtori, 12, 20900 Monza',
                'nr_of_rooms' => 4,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 3,
                'square_mt' => 54,
                'latitude' => '45.59057',
                'longitude' => '9.26341',
                'description' => 'Completely renovated, prestigious one bedroom apartment.',
                'image_path' => '/uploads/house-4.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Appartamento moderno a due passi dal centro',
                'address' => 'Via Vittorio Emanuele II, 43, 20900 Monza',
                'nr_of_rooms' => 6,
                'nr_of_beds' => 3,
                'nr_of_bathrooms' => 3,
                'square_mt' => 55,
                'latitude' => '45.58474',
                'longitude' => '9.27989',
                'description' => "Appartamento completo di tutti i servizi necessari per un soggiorno, tra cui: TV 49' Ultra HD nel soggiorno con impianto home theatre, TV in camera, lavatrice, forno elettrico, microonde ed altro ancora. L'appartamento è situato al 6ºpiano, zona servita,stazione di Monza a 2km, stazione sobborghi a 800mt,centro a 1,7km supermercati,centri commerciali e vari locali nelle vicinanze. In più,villa reale di Monza, parco e autodromo tutto a 2km",
                'image_path' => '/uploads/house-3.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Lovely apartment well served',
                'address' => 'Via Giacomo Matteotti, 12, 20090 Assago',
                'nr_of_rooms' => 4,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 2,
                'square_mt' => 40,
                'latitude' => '45.40961',
                'longitude' => '9.13345',
                'description' => 'Lovely newly built apartment located in a quiet area composed of a kitchen room with a sofa bed, a double bedroom and a bathroom with shower. Complete with all the appliances, smarttv and paytv. Autonomous heating. Well served near by the means to reach Milan or the Forum of Assago. Nearby supermarket, shops and large park. Parking near the house, not private. For check in before 15:00 or after 20 contact me.',
                'image_path' => '/uploads/apartment-4.jpg',
                'visible' => 0,
                'advertised' => 0,
            ],
            [
                'title' => 'All u need is ... here!!!',
                'address' => 'Via Papa Giovanni XXIII, 1, 20090 Assago',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 47,
                'latitude' => '45.40513',
                'longitude' => '9.13481',
                'description' => 'Comfortable studio, well connected to the center. Kitchen, wifi, balcony, air conditioning and bathroom. Perfect for leisure weekends or business trips. All the details are carefully listed in the ad, we have a few reasonable rules that we ask you to read :)',
                'image_path' => '/uploads/apartment-2.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Private room for One/two',
                'address' => 'Via Duccio di Buoninsegna, 11, 20090 Assago',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 2,
                'square_mt' => 40,
                'latitude' => '45.40781',
                'longitude' => '9.12965',
                'description' => 'Great location, two three mins walking from train/metro/bus/tram stops. A perfect mix of silent surroundings and availability of all necessary things nearby',
                'image_path' => '/uploads/house-3.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Apartment with private bathroom and balcony',
                'address' => 'Via Europa, 18, 20097 San Donato Milanese',
                'nr_of_rooms' => 3,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 60,
                'latitude' => '45.41586',
                'longitude' => '9.27170',
                'description' => "Comfortable, bright and spacious room with private bathroom. There are two other rooms with guests in the flat. The neighborhood is calm and green. Supermarket, restautants and shops 5 minutes far by feet. INCLUDED: towels and linens, use of Kitchen. Wifi 60-70 Mbps. All details in the announcement are accurate. NOT INCLUDED: breakfast, lift from/to airport All parts are cleaned and sanitized! We have few small rules, please read them :)",
                'image_path' => '/uploads/house-2.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Stanza singola in Via F. Maritano',
                'address' => 'Via Piave, 13, 20097 San Donato Milanese',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 38,
                'latitude' => '45.40850',
                'longitude' => '9.26743',
                'description' => 'Camera singola in appartamento comodo ad ogni servizio. A fianco al policlinico di San Donato e comodo a tutti i palazzi Eni. Inoltre sono presenti tanti negozi e supermarket. Sotto casa ci sono due fermate autobus con i quali si può raggiungere il capolinea della MM3 linea gialla che in dieci minuti porta al Duomo di Milano e stazione centrale, inoltre è comodo per aeroporto di Linate che si raggiunge con l’auto in 10 minuti. Vicino sono presenti altri servizi come il bike e car sharing.',
                'image_path' => '/uploads/apartment-6.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Quiet and comfortable room',
                'address' => 'Via Enrico Mattei, 56, 20097 San Donato Milanese',
                'nr_of_rooms' => 6,
                'nr_of_beds' => 3,
                'nr_of_bathrooms' => 3,
                'square_mt' => 42,
                'latitude' => '45.40838',
                'longitude' => '9.27526',
                'description' => 'Spazioso appartamento immerso nel verde. Wifi ultraveloce, aria condizionata in ogni camera, riscaldamento. Spacious apartment surrounded by greenery. Ultra-fast WiFi, air conditioning in every room, heating',
                'image_path' => '/uploads/apartment-5.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Simple & Comfortable apartment vicino POLICLINICO',
                'address' => 'Via della Libertà, 29, 20097 San Donato Milanese',
                'nr_of_rooms' => 1,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 53,
                'latitude' => '45.41631',
                'longitude' => '9.26284',
                'description' => "PER SICUREZZA, STIAMO DISINFETTANDO CON PARTICOLARE CURA TUTTE LE SUPERFICIE TRA UNA PRENOTAZIONE E L'ALTRA. L'appartamento si trova in un palazzo ben curato al piano rialzato e affacciato su un bel giardino, composto da una camera, cucina abitabile e bagno. Completamente arredato. E' situato in una zona tranquilla ben servita dai mezzi pubblici (bus e treni) vicino al Policlinico di San Donato. Milano centro facilmente raggiungibile. Parcheggio non custodito sulla strada. WI-FI limitato",
                'image_path' => '/uploads/apartment-2.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Ampio bilocale San Donato Milanese',
                'address' => 'Via John Fitzgerald Kennedy, 24, 20097 San Donato Milanese',
                'nr_of_rooms' => 2,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 2,
                'square_mt' => 57,
                'latitude' => '45.43088',
                'longitude' => '9.26460',
                'description' => 'Appartamento appena ristrutturato. in via john fitzgerald kennedy. san donato',
                'image_path' => '/uploads/apartment-1.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Camera matrimoniale a san donato milanese',
                'address' => 'Via Rodolfo Morandi, 13, 20097 San Donato Milanese',
                'nr_of_rooms' => 2,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 49,
                'latitude' => '45.41254',
                'longitude' => '9.27440',
                'description' => "Affitto camere a 530 euro/mese o 350 euro/mese in condivisione (due posti letto). L'appartamento è in centro a San donato Milanese, di fronte al comune a 10 minuti a piedi dall'ospedale e 15 minuti dalla mm3. E' un appartamento di 120 mq con tre stanze, due bagni, cucina e salotto ampio. L'appartamento è in condivisione con altri due ospiti.",
                'image_path' => '/uploads/apartment-2.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
            [
                'title' => 'Lucy Home in Old Town Pavia',
                'address' => 'Via Camillo Campari, 71, 27100 Pavia',
                'nr_of_rooms' => 5,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 2,
                'square_mt' => 40,
                'latitude' => '45.18821',
                'longitude' => '9.17215',
                'description' => "Nuovo e grazioso bilocale in pieno centro storico di Pavia, 50m dal Duomo.(ztl).Composto da soggiorno con divano letto e cucina a vista con tavolo grande 4 posti a sedere, tv a schermo piatto 55 pollici, camera da letto con letto una piazza e mezza, bagno con doccia, wifi, lavatrice e aria condizionata. Arredamento completamente nuovo e moderno. Asciugamani e lenzuola a disposizione. Colazione offerta. Culla e seggiolone su richiesta. Affitto 2 biciclette e un monopattino elettrico. Prezzo in DM",
                'image_path' => '/uploads/house-1.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'si affitta posto solo a donna',
                'address' => 'Via Saverio Griffini, 48, 27100 Pavia',
                'nr_of_rooms' => 2,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 2,          
                'square_mt' => 42,
                'latitude' => '45.19022',
                'longitude' => '9.13029',
                'description' => 'ciao si affitta due posto letto in un monolocale con due piano un letto si trova a piano sopra
                ci sono lavatrice e microonde la casa si trova sul terra e ha un grande giardino e posto auto gratuito si affitta solo a donna io ci sono gia a casa',
                'image_path' => '/uploads/house-3.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'Vaccari Apartment',
                'address' => 'Via Ponte Vecchio, 40, 27100 Pavia',
                'nr_of_rooms' => 4,
                'nr_of_beds' => 4,
                'nr_of_bathrooms' => 2,
                'square_mt' => 60,
                'latitude' => '45.17736',
                'longitude' => '9.15180',
                'description' => 'Forniremo ai nostri ospiti bagno esclusivo , wifi gratuito, ambienti riscaldati, aria condizionata, possibilità di rientrare a qualsiasi ora della notte, angolo cottura, camer climatizzate sono attrezzate con phon, accesso internet, un letto per, tv, specchio
                Possono soggiornare fino a 4 ospiti.',
                'image_path' => '/uploads/house-4.jpg',
                'visible' => 0,
                'advertised' => 1,
            ],
            [
                'title' => 'Grazioso bilocale in centro',
                'address' => 'Via Severino Capsoni, 14, 27100 Pavia',
                'nr_of_rooms' => 2,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 1,
                'square_mt' => 55,
                'latitude' => '45.18232',
                'longitude' => '9.15494',
                'description' => "Bilocale composto da una camera da letto cucina/soggiorno e bagno. La zona è a traffico limitato pertanto si può posteggiare l'auto sul Lungoticino Sforza o in Corso Garibaldi che distano circa 300 metri e raggiungere la casa a piedi.Molto tranquillo.
                Essendo al piano strada e in contesto condominiale sono possibili rumori",
                'image_path' => '/uploads/apartment-4.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'cozy home near dome-heart of pavia-',
                'address' => 'Via Pasquale Del Giudice, 2, 27100 Pavia',
                'nr_of_rooms' => 3,
                'nr_of_beds' => 1,
                'nr_of_bathrooms' => 2,
                'square_mt' => 45,
                'latitude' => '45.19937',
                'longitude' => '9.15826',
                'description' => 'Cozy flat near dome in the heart of pavia. One ground for living room and kitchen, second ground with wedding room and a comunicate room for dress with another single bed and bathroom. The line bus are very close from the house',
                'image_path' => '/uploads/apartment-1.jpg',
                'visible' => 1,
                'advertised' => 0,
            ],
            [
                'title' => 'A due passi dal centro',
                'address' => 'Via Gerolamo Cardano, 41, 27100 Pavia',
                'nr_of_rooms' => 4,
                'nr_of_beds' => 2,
                'nr_of_bathrooms' => 2,
                'square_mt' => 40,
                'latitude' => '45.18344',
                'longitude' => '9.15348',
                'description' => "Appartamento ristrutturato, sito al primo piano di una palazzina tranquilla. archeggio gratuito in strada nei pressi dell’appartamento.
                L'appartamento è dotato di ogni comfort Aria condizionata, Tv, ferro/asse da stiro, macchina del caffè, bollitore, Frigo/freezer, cucina attrezzata, lavastoviglie, set di cortesia bagno, asciugamani e lenzuola, asciugacapelli, kit di prodotti per prepararsi una gustosa colazione.",
                'image_path' => '/uploads/apartment-6.jpg',
                'visible' => 1,
                'advertised' => 1,
            ],
        ];

        // Get collection of 'id' from users table
        $users = User::all()->pluck('id')->toArray();
        foreach ($houses as $house) { 
            $newHouse = new House();
            $newHouse->user_id = $faker->randomElement($users);
            $newHouse->title = $house['title'];
            $newHouse->nr_of_rooms = $house['nr_of_rooms'];
            $newHouse->nr_of_beds = $house['nr_of_rooms'];
            $newHouse->nr_of_bathrooms = $house['nr_of_bathrooms'];
            $newHouse->square_mt = $house['square_mt'];
            $newHouse->address = $house['address'];
            $newHouse->latitude = $house['latitude'];
            $newHouse->longitude = $house['longitude'];
            $newHouse->image_path = $house['image_path'];
            $newHouse->visible = $house['visible'];
			$newHouse->advertised = $house['advertised'];
			$newHouse->description = $house['description'];
            $newHouse->save();
        }
    }
}
