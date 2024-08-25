using System;
using System.Collections.Generic;

namespace Projekat_Teretana.Models.Entity;

public partial class Treninzi
{
    public int Id { get; set; }

    public string PocetakTreninga { get; set; } = null!;

    public string KrajTreninga { get; set; } = null!;

    public string Clan { get; set; } = null!;

    public string Trener { get; set; } = null!;
}
