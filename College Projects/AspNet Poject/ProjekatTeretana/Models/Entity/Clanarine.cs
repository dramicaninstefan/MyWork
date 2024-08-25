using System;
using System.Collections.Generic;

namespace Projekat_Teretana.Models.Entity;

public partial class Clanarine
{
    public int Id { get; set; }

    public string Naziv { get; set; } = null!;

    public string Trajanje { get; set; } = null!;

    public string Cena { get; set; } = null!;
}
