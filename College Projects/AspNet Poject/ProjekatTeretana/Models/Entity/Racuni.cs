using System;
using System.Collections.Generic;

namespace Projekat_Teretana.Models.Entity;

public partial class Racuni
{
    public int Id { get; set; }

    public string Clan { get; set; } = null!;

    public string Cena { get; set; } = null!;

    public DateOnly? Datum { get; set; }
}
