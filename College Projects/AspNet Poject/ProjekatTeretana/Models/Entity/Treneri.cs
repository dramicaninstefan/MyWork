using System;
using System.Collections.Generic;

namespace Projekat_Teretana.Models.Entity;

public partial class Treneri
{
    public int Id { get; set; }

    public string Ime { get; set; } = null!;

    public string Prezime { get; set; } = null!;

    public string Cena { get; set; } = null!;
}
