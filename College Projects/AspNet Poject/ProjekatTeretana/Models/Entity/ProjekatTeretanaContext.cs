using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;
using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Entity;

public partial class ProjekatTeretanaContext : DbContext
{
    public ProjekatTeretanaContext()
    {
    }

    public ProjekatTeretanaContext(DbContextOptions<ProjekatTeretanaContext> options)
        : base(options)
    {
    }

    public virtual DbSet<Clanarine> Clanarines { get; set; }

    public virtual DbSet<Clanovi> Clanovis { get; set; }

    public virtual DbSet<Racuni> Racunis { get; set; }

    public virtual DbSet<Treneri> Treneris { get; set; }

    public virtual DbSet<Treninzi> Treninzis { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see https://go.microsoft.com/fwlink/?LinkId=723263.
        => optionsBuilder.UseSqlServer("Server=DESKTOP-3RD4MAC;Database=Projekat_Teretana;Integrated Security=True;Encrypt=True;TrustServerCertificate=True;");

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Clanarine>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__Clanarin__3214EC079BA54C72");

            entity.ToTable("Clanarine");

            entity.Property(e => e.Cena).HasMaxLength(55);
            entity.Property(e => e.Naziv).HasMaxLength(55);
            entity.Property(e => e.Trajanje).HasMaxLength(55);
        });

        modelBuilder.Entity<Clanovi>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__Clanovi__3214EC07041521A5");

            entity.ToTable("Clanovi");

            entity.Property(e => e.Ime).HasMaxLength(55);
            entity.Property(e => e.Prezime).HasMaxLength(55);
            entity.Property(e => e.VrstaClanarine).HasMaxLength(55);
        });

        modelBuilder.Entity<Racuni>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__Racuni__3214EC075E69217E");

            entity.ToTable("Racuni");

            entity.Property(e => e.Cena).HasMaxLength(55);
            entity.Property(e => e.Clan).HasMaxLength(55);
        });

        modelBuilder.Entity<Treneri>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__Treneri__3214EC07D8501190");

            entity.ToTable("Treneri");

            entity.Property(e => e.Cena).HasMaxLength(55);
            entity.Property(e => e.Ime).HasMaxLength(55);
            entity.Property(e => e.Prezime).HasMaxLength(55);
        });

        modelBuilder.Entity<Treninzi>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__Treninzi__3214EC073A0E1682");

            entity.ToTable("Treninzi");

            entity.Property(e => e.Clan).HasMaxLength(55);
            entity.Property(e => e.KrajTreninga).HasMaxLength(55);
            entity.Property(e => e.PocetakTreninga).HasMaxLength(55);
            entity.Property(e => e.Trener).HasMaxLength(55);
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);

public DbSet<Projekat_Teretana.Models.BO.ClanarineBO> ClanarineBO { get; set; } = default!;

public DbSet<Projekat_Teretana.Models.BO.ClanoviBO> ClanoviBO { get; set; } = default!;

public DbSet<Projekat_Teretana.Models.BO.TreneriBO> TreneriBO { get; set; } = default!;

public DbSet<Projekat_Teretana.Models.BO.TreninziBO> TreninziBO { get; set; } = default!;

public DbSet<Projekat_Teretana.Models.BO.RacuniBO> RacuniBO { get; set; } = default!;
}
