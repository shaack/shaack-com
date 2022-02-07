# Ninox

## Ninox Script

### Create a new record and copy some data

```
let curRec := this;
let newRec := (create Tasks);
newRec.(Leistung := curRec.Leistung);
newRec.(Prio := curRec.Prio);
popupRecord(newRec);
```

### Auto increment invoice number

```
Rechnungsnummer := max((select Projekte).Rechnungsnummer) + 1;
Rechnungsdatum := now();
```

### Time tracking with Ninox

#### Start tracking

```
if Start = null then Start := now() end;
let self := this;
let newZeiterfassung := (create Zeiterfassung);
newZeiterfassung.(Task := self);
newZeiterfassung.(Start := now());
popupRecord(newZeiterfassung)
```

#### Log tracking

```
if Zeitdauer = null then
	Zeitdauer := now() - Start
end;
var thisTask := this.Task;
var tGesamtzeit := sum((select Zeiterfassung where Task = thisTask).Zeitdauer);
tGesamtzeit := round(tGesamtzeit / 3600000 * 4) * 3600000 / 4;
Task.(Zeitdauer := tGesamtzeit);
closeRecord()
```

## External references

- https://docs.ninox.com/en/script/functions-overview