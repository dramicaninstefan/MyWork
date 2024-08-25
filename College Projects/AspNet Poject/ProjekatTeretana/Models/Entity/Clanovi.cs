using System;
using System.Collections.Generic;

namespace Projekat_Teretana.Models.Entity;

public partial class Clanovi
{
    public int Id { get; set; }

    public string Ime { get; set; } = null!;

    public string Prezime { get; set; } = null!;

    public string? VrstaClanarine { get; set; }
}
