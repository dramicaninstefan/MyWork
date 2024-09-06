const prebivaliste_list = [
  { id: 1, name: 'Izaberite' },
  { id: 2, name: 'Ada' },
  { id: 3, name: 'Aleksandrovac' },
  { id: 4, name: 'Aleksinac' },
  { id: 5, name: 'Alibunar' },
  { id: 6, name: 'Apatin' },
  { id: 7, name: 'Aranđelovac' },
  { id: 8, name: 'Arilje' },
  { id: 9, name: 'Babušnica' },
  { id: 10, name: 'Bač' },
  { id: 11, name: 'Bačka Palanka' },
  { id: 12, name: 'Bačka Topola' },
  { id: 13, name: 'Bački Petrovac' },
  { id: 14, name: 'Bajina Bašta' },
  { id: 15, name: 'Batočina' },
  { id: 16, name: 'Bečej' },
  { id: 17, name: 'Bela Crkva' },
  { id: 18, name: 'Bela Palanka' },
  { id: 19, name: 'Beočin' },
  { id: 20, name: 'Beograd-Barajevo' },
  { id: 21, name: 'Beograd-Čukarica' },
  { id: 22, name: 'Beograd-Grocka' },
  { id: 23, name: 'Beograd-Lazarevac' },
  { id: 24, name: 'Beograd-Mladenovac' },
  { id: 25, name: 'Beograd-Novi Beograd' },
  { id: 26, name: 'Beograd-Obrenovac' },
  { id: 27, name: 'Beograd-Palilula' },
  { id: 28, name: 'Beograd-Rakovica' },
  { id: 29, name: 'Beograd-Savski Venac' },
  { id: 30, name: 'Beograd-Sopot' },
  { id: 31, name: 'Beograd-Stari Grad' },
  { id: 32, name: 'Beograd-Surčin' },
  { id: 33, name: 'Beograd-Voždovac' },
  { id: 34, name: 'Beograd-Vračar' },
  { id: 35, name: 'Beograd-Zemun' },
  { id: 36, name: 'Beograd-Zvezdara' },
  { id: 37, name: 'Blace' },
  { id: 38, name: 'Bogatić' },
  { id: 39, name: 'Bojnik' },
  { id: 40, name: 'Boljevac' },
  { id: 41, name: 'Bor' },
  { id: 42, name: 'Bosilegrad' },
  { id: 43, name: 'Brus' },
  { id: 44, name: 'Bujanovac' },
  { id: 45, name: 'Čačak' },
  { id: 46, name: 'Čajetina' },
  { id: 47, name: 'Ćićevac' },
  { id: 48, name: 'Čoka' },
  { id: 49, name: 'Crna Trava' },
  { id: 50, name: 'Ćuprija' },
  { id: 51, name: 'Dečani' },
  { id: 52, name: 'Despotovac' },
  { id: 53, name: 'Dimitrovgrad' },
  { id: 54, name: 'Doljevac' },
  { id: 55, name: 'Gadžin Han' },
  { id: 56, name: 'Glogovac' },
  { id: 57, name: 'Gnjilane' },
  { id: 58, name: 'Golubac' },
  { id: 59, name: 'Gora' },
  { id: 60, name: 'Gornji Milanovac' },
  { id: 61, name: 'Inđija' },
  { id: 62, name: 'Irig' },
  { id: 63, name: 'Istok' },
  { id: 64, name: 'Ivanjica' },
  { id: 65, name: 'Jagodina' },
  { id: 66, name: 'Kačanik' },
  { id: 67, name: 'Kanjiža' },
  { id: 68, name: 'Kikinda' },
  { id: 69, name: 'Kladovo' },
  { id: 70, name: 'Klina' },
  { id: 71, name: 'Knić' },
  { id: 72, name: 'Knjaževac' },
  { id: 73, name: 'Koceljeva' },
  { id: 74, name: 'Kosjerić' },
  { id: 75, name: 'Kosovo Polje' },
  { id: 76, name: 'Kosovska Kamenica' },
  { id: 77, name: 'Kosovska Mitrovica' },
  { id: 78, name: 'Kovačica' },
  { id: 79, name: 'Kovin' },
  { id: 80, name: 'Kragujevac-grad' },
  { id: 81, name: 'Kraljevo' },
  { id: 82, name: 'Krupanj' },
  { id: 83, name: 'Kruševac' },
  { id: 84, name: 'Kučevo' },
  { id: 85, name: 'Kula' },
  { id: 86, name: 'Kuršumlija' },
  { id: 87, name: 'Lajkovac' },
  { id: 88, name: 'Lapovo' },
  { id: 89, name: 'Lebane' },
  { id: 90, name: 'Leposavić' },
  { id: 91, name: 'Leskovac' },
  { id: 92, name: 'Lipljan' },
  { id: 93, name: 'Ljig' },
  { id: 94, name: 'Ljubovija' },
  { id: 95, name: 'Loznica' },
  { id: 96, name: 'Lučani' },
  { id: 97, name: 'Majdanpek' },
  { id: 98, name: 'Mali Iđoš' },
  { id: 99, name: 'Mali Zvornik' },
  { id: 100, name: 'Malo Crniće' },
  { id: 101, name: 'Merošina' },
  { id: 102, name: 'Mionica' },
  { id: 103, name: 'Negotin' },
  { id: 104, name: 'Niš-Crveni Krst' },
  { id: 105, name: 'Niš-Grad' },
  { id: 106, name: 'Niš-Mediana' },
  { id: 107, name: 'Niš-Niška Banja' },
  { id: 108, name: 'Niš-Palilula' },
  { id: 109, name: 'Niš-Pantelej' },
  { id: 110, name: 'Nova Crnja' },
  { id: 111, name: 'Nova Varoš' },
  { id: 112, name: 'Novi Bečej' },
  { id: 113, name: 'Novi Kneževac' },
  { id: 114, name: 'Novi Pazar' },
  { id: 115, name: 'Novi Sad-grad' },
  { id: 116, name: 'Novo Brdo' },
  { id: 117, name: 'Obilić' },
  { id: 118, name: 'Odžaci' },
  { id: 119, name: 'Opovo' },
  { id: 120, name: 'Orahovac' },
  { id: 121, name: 'Osečina' },
  { id: 122, name: 'Pančevo' },
  { id: 123, name: 'Paraćin' },
  { id: 124, name: 'Peć' },
  { id: 125, name: 'Pećinci' },
  { id: 126, name: 'Petrovac' },
  { id: 127, name: 'Pirot' },
  { id: 128, name: 'Plandište' },
  { id: 129, name: 'Podujevo' },
  { id: 130, name: 'Požarevac' },
  { id: 131, name: 'Požega' },
  { id: 132, name: 'Preševo' },
  { id: 133, name: 'Priboj' },
  { id: 134, name: 'Prijepolje' },
  { id: 135, name: 'Priština' },
  { id: 136, name: 'Prokuplje' },
  { id: 137, name: 'Rača' },
  { id: 138, name: 'Raška' },
  { id: 139, name: 'Ražanj' },
  { id: 140, name: 'Rekovac' },
  { id: 141, name: 'Ruma' },
  { id: 142, name: 'Šabac' },
  { id: 143, name: 'Sečanj' },
  { id: 144, name: 'Senta' },
  { id: 145, name: 'Smederevo' },
  { id: 146, name: 'Smederevska Palanka' },
  { id: 147, name: 'Sokobanja' },
  { id: 148, name: 'Sombor' },
  { id: 149, name: 'Srbica' },
  { id: 150, name: 'Srbobran' },
  { id: 151, name: 'Sremska Mitrovica' },
  { id: 152, name: 'Sremski Karlovci' },
  { id: 153, name: 'Stara Pazova' },
  { id: 154, name: 'Subotica' },
  { id: 155, name: 'Surdulica' },
  { id: 156, name: 'Svilajnac' },
  { id: 157, name: 'Šid' },
  { id: 158, name: 'Temerin' },
  { id: 159, name: 'Titel' },
  { id: 160, name: 'Topola' },
  { id: 161, name: 'Trgovište' },
  { id: 162, name: 'Tutin' },
  { id: 163, name: 'Ub' },
  { id: 164, name: 'Užice' },
  { id: 165, name: 'Valjevo' },
  { id: 166, name: 'Varvarin' },
  { id: 167, name: 'Velika Plana' },
  { id: 168, name: 'Veliko Gradište' },
  { id: 169, name: 'Vitina' },
  { id: 170, name: 'Vladičin Han' },
  { id: 171, name: 'Vladimirci' },
  { id: 172, name: 'Vlasotince' },
  { id: 173, name: 'Vranje' },
  { id: 174, name: 'Vrbas' },
  { id: 175, name: 'Vrnjačka Banja' },
  { id: 176, name: 'Vršac' },
  { id: 177, name: 'Zaječar' },
  { id: 178, name: 'Zemun' },
  { id: 179, name: 'Zrenjanin' },
  { id: 180, name: 'Žabari' },
  { id: 181, name: 'Žabalj' },
  { id: 182, name: 'Žagubica' },
  { id: 183, name: 'Žitorađa' },
  { id: 184, name: 'Žitište' },
];

export default prebivaliste_list;
