# MyParcel assessment PHP developer

Het doel van deze opdracht is om te laten zien wat je kunt. Voel je vrij om een beetje 
te over-engineeren als je daarmee kunt laten zien hoe je een groter project zou aanpakken.
Wij kijken hierbij naar de schaalbaarheid van de oplossing.

Gebruik van TDD wordt gewaardeerd.

Werk in kleine commits, zodat we je werkwijze kunnen volgen.
Graag inleveren via GitHub.

## De opdracht

Bij MyParcel kan de webshop eigenaar een pakket versturen naar elk land ter wereld met een 
aantal vervoerders. Niet elke vervoerder (Carrier) zendt elk type pakket (PackageType) naar 
elke bestemming (Region) op elke dag.  

Hier een tabel met sterk vereenvoudigde business rules.

We kennen vier regio's:
- NL: Nederland
- BE: België
- EU: Europa
- ROW: Rest of world

-----------------------------------------------------
| Carrier | PackageType | Region | Weekends | Price |
-----------------------------------------------------
| PostNL  | Standard    | NL     | Yes      | 6,95  |
| PostNL  | Mailbox     | NL     | Yes      | 3,95  |
| PostNL  | Pallet      | NL     | No       | 26,95 |
| PostNL  | Standard    | BE     | Yes      | 7,95  |
| PostNL  | Mailbox     | BE     | Yes      | 4,95  |
| PostNL  | Standard    | EU     | Yes      | 10,95 |
| PostNL  | Standard    | ROW    | No       | 13,95 |
| DHL     | Standard    | NL     | Yes      | 7,45  |
| DHL     | Mailbox     | NL     | Yes      | 4,45  |
| DHL     | Standard    | BE     | Yes      | 8,45  |
| DHL     | Mailbox     | BE     | Yes      | 5,45  |
| DHL     | Standard    | EU     | No       | 10,45 |
| DHL     | Standard    | ROW    | No       | 12,45 |
| DPD     | Standard    | NL     | Yes      | 7,75  |
| DPD     | Mailbox     | NL     | No       | 4,75  |
| DPD     | Pallet      | NL     | Yes      | 21,75 |
| DPD     | Standard    | BE     | Yes      | 8,75  |
| DPD     | Mailbox     | BE     | No       | 5,75  |
| DPD     | Pallet      | BE     | Yes      | 23,75 |
| DPD     | Standard    | EU     | No       | 10,75 |
| DPD     | Standard    | ROW    | No       | 12,75 |
| UPS     | Mailbox     | NL     | No       | 4,25  |
| UPS     | Mailbox     | BE     | No       | 5,25  |
| UPS     | Mailbox     | EU     | No       | 6,25  |
| UPS     | Mailbox     | ROW    | No       | 8,25  |
-----------------------------------------------------

Bouw een api endpoint die voor een zending met 1 of meer van deze parameters alle 
mogelijke opties met prijs teruggeeft.

Parameters:
- Country
- Shipment date
- Package type
