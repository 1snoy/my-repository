using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Авиакасса
{
    public class Ticket_OfficeContext : DbContext
    {
        public Ticket_OfficeContext() : base("DefaultConnection") { }
        public DbSet<Ticket> Tickets { get; set; }
    }
}
