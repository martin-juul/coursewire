<?php

namespace Database\Seeders;

use App\Models\EducationType;
use Illuminate\Database\Seeder;

class EducationTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (EducationType::count() > 0) {
            return;
        }

        EducationType::create([
            'title'                    => 'IT-Supporter',
            'short_name'               => 'IT-Supporter',
            'occupational_category'    => '3512',
            'program_type'             => 'apprenticeship',
            'time_to_complete'         => 'P2Y11M',
            'credential_awarded'       => 'degree',
            'program_prerequisites'    => 'HighSchool',
            'day_of_week'              => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'term_duration'            => 'P10W',
            'educational_program_mode' => 'IN_PERSON',
            'financial_aid_eligible'   => 'PUBLIC_AID',
            'training_salary'          => 72.50,
            'completion_salary'        => 176,
            'about'                    => '# Sørg for den bedste IT-faglige hjælp til maskiner – og mennesker

Der findes stort set ikke virksomheder, der ikke er afhængige af it på den ene eller anden måde. Og det betyder samtidig, at stort set alle virksomheder har behov for nogle, der kan sikre, at systemerne virker optimalt – og en, der kan hjælpe, hvis de ikke gør.
Som it-supporter skal du ikke alene kunne finde og fikse it-relaterede problemer - du skal også kunne forklare og få folk til at forstå problemet. Eller i det mindste for dem til ikke at lave den samme fejl igen – eller i så fald kunne løse problemet selv.

På uddannelsen opnår du en bred viden om it, der gør dig i stand til at finde fejl og se sammenhænge mellem forskellige systemer. Du bliver også klædt på til at foretage rutinetjek i it-afdelingen.

Desuden lærer du at opbygge og vedligeholde samt optimere netværksløsninger.

Som uddannet it-supporter vil dine primære opgaver være at:

+ Drifte og vedligeholdelse af it-systemet
+ Finde og fikse it-relaterede fejl og brugerfejl
+ Installere og konfigurere computere, programmer og øvrige it-installationer
+ Vejlede brugerne og sikre hjælp-til-selvhjælp
+ Tilslutte monitorer, printere, routere, servere mv.',
        ]);

        EducationType::create([
            'title'                    => 'Datatekniker med speciale i programmering',
            'short_name'               => 'Datatekniker / Programmering',
            'occupational_category'    => '2512',
            'program_type'             => 'apprenticeship',
            'time_to_complete'         => 'P5Y',
            'credential_awarded'       => 'degree',
            'program_prerequisites'    => 'HighSchool',
            'day_of_week'              => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'term_duration'            => 'P10W',
            'educational_program_mode' => 'IN_PERSON',
            'financial_aid_eligible'   => 'PUBLIC_AID',
            'training_salary'          => 72.50,
            'completion_salary'        => 250,
            'about'                    => '# Skab fremtidens digitale løsninger - og skab fremtiden!

Java, SML. Python, SQL, C# … tænker du, at det er total volapyk? Så kan vi garantere dig, at det synes du ikke, når du er færdig med dit speciale. Koder og programmering hænger nemlig uløseligt sammen – men det ved du nok allerede.
Vi lever i en digital verden, hvor apps, websites og andre it-systemer er helt naturlige – ja, faktisk uundværlige redskaber i hverdagen. Mange har ideer til nye digitale løsninger, men de færreste kan i dag finde ud af at programmere og reelt udvikle dem. Datateknikere med speciale i programmeringer er derfor en eftertragtet ressource både nu, men bestemt også i fremtiden.

I løbet af uddannelsen lærer du ikke bare at skrive en masse koder slavisk ned i en editor. Du lærer derimod at tænke kreativt, løsningsorienteret og systematisk. Herudover får du selvfølgelig kendskab til de mest anvendte og fremtidssikrede programmeringssprog - og lærer at vurdere, hvilken type kode, der vil være mest egnet til formålet.

Som uddannet datatekniker med speciale i programmering vil dine primære opgaver være at:

+ Udvikle idéer til it-systemers funktionalitet, design og struktur
+ Opbygge og vedligeholde forskellige typer it-systemer
+ Give support og vejledning til brugerne af systemet
+ Løbende fejlsøgning, vedligeholdelse og support
+ Følge de nyeste teknogier tæt og anvende dem',
        ]);

        EducationType::create([
            'title'                    => 'Datatekniker med speciale i infrastruktur',
            'short_name'               => 'Datatekniker / Infrastruktur',
            'occupational_category'    => '3513',
            'program_type'             => 'apprenticeship',
            'time_to_complete'         => 'P5Y',
            'credential_awarded'       => 'degree',
            'program_prerequisites'    => 'HighSchool',
            'day_of_week'              => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'term_duration'            => 'P10W',
            'educational_program_mode' => 'IN_PERSON',
            'financial_aid_eligible'   => 'PUBLIC_AID',
            'training_salary'          => 72.50,
            'completion_salary'        => 250,
            'about'                    => '# Opbyg brugbare og brugervenlige IT-Systemer og Netværk

De kan være simple eller avancerede. Statiske eller dynamiske. Til brugere eller superbrugere. Som datetekniker med speciale i infrastruktur er det din opgave, at netværket eller it-systemet fungerer optimalt i forhold til målgruppen.
Selv de nyeste og hurtigste maskiner arbejder ikke hurtigere end it-infrastrukturen giver plads til. Det er derfor dit job at sikre lynhurtige forbindelser internt og eksternt. Derfor har de fleste virksomheder brug for datateknikere med speciale i it-infrastruktur til at opbygge netværk, server- og storage-systemer.

I løbet af uddannelsen får du viden om, hvordan du opbygger og vedligeholder datasystemer med forskellige formål og funktioner. Du lærer også om installation og konfiguration af forskellige former for dataanlæg – og koble styresystemer og net sammen.

Som uddannet datatekniker med speciale i infrastruktur vil dine primære opgaver være at:

+ Opbygge og optimere samt installere og implementere it-infrastrukturer
+ Sikre det bedst mulige sammenspil mellem bruger og brugerdesign
+ Vedligeholde og sikre optimal drift af it-systemer
+ Give support og vejledning til brugerne af systemet
+ Følge de nyeste teknogier tæt og anvende dem',
        ]);
    }
}
