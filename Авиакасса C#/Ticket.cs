using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Авиакасса
{
    public class Ticket
    {
        public int Id { get; set; }
        public DateTime Date { get; set; }
        public string Name { get; set; }
        public string StartCity { get; set; }
        public string FinishCity { get; set; }
        public string NumberOfPassport { get; set; }
        public int NumberOfReys { get; set; }
        public int NumberOfSeat { get; set; }
        public int Price { get; set; }
    }
    public interface IRepository// интерфейс
    {
        void Create(Ticket user);
        void Delete(int id);
        Ticket Get(int id);
        List<Ticket> GetUsers();
        void Update(Ticket user);
    }
    public class Repository : IRepository // репозиторий
    {
        public void Create(Ticket user)
        {
            using (Ticket_OfficeContext context = new Ticket_OfficeContext())
            {
                context.Tickets.Add(user);
                context.SaveChanges();
            }
        }

        public void Delete(int id)
        {
            using (Ticket_OfficeContext context = new Ticket_OfficeContext())
            {
                context.Tickets.Remove(context.Tickets.Find(id));
                context.SaveChanges();
            }
        }

        public Ticket Get(int id)
        {
            using (Ticket_OfficeContext context = new Ticket_OfficeContext())
            {
                return context.Tickets.Find(id);
            }
        }

        public List<Ticket> GetUsers()
        {
            using (Ticket_OfficeContext context = new Ticket_OfficeContext())
            {
                return context.Tickets.ToList();
            }
        }

        public void Update(Ticket user)
        {
            using (Ticket_OfficeContext context = new Ticket_OfficeContext())
            {
                Delete(user.Id);
                context.Tickets.Add(user);
                context.Tickets.OrderBy(p => p.Id);
                context.SaveChanges();
            }
        }
    }
}
