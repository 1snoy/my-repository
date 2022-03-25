using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Авиакасса
{
    public partial class ShowForm : Form
    {
        public ShowForm()
        {
            InitializeComponent();
            InitializeData();
            comboBox1.Items.AddRange(new string[] {"ID","Name","Price"});
        }
        void InitializeData()
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = repository.GetUsers();
        }

        private void button2_Click(object sender, EventArgs e) // сортировка
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = repository.GetUsers().OrderBy(p=>p.Id).ToList();
        }

        private void button3_Click(object sender, EventArgs e) // групировка
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = (from u in repository.GetUsers()
                                        group u by u.FinishCity into u2
                                        select new { FinishCity = u2.Key }).ToList();
        }

        private void button1_Click(object sender, EventArgs e) // фильтрация
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = repository.GetUsers().Where(p => p.NumberOfReys==int.Parse(textBox1.Text)).ToList();
        }

        private void button5_Click(object sender, EventArgs e) // проецирование
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = (from u in repository.GetUsers()
                                        group u by u.Name into u2
                                        select new { Name=u2.Key}).ToList();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Repository repository = new Repository();
            switch (comboBox1.Text)
            {
                case "ID":
                    dataGridView1.DataSource = repository.GetUsers().OrderBy(p => p.Id).ToList();
                    break;
                case "Name":
            dataGridView1.DataSource = repository.GetUsers().OrderBy(p => p.Name).ToList();
                    break;
                case "Price":
            dataGridView1.DataSource = repository.GetUsers().OrderBy(p => p.Price).ToList();
                    break;
            }
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Repository repository = new Repository();
            textBox2.Text = repository.GetUsers().Count.ToString() ;
        }

        private void button7_Click(object sender, EventArgs e)//объединение
        {
            Repository repository = new Repository();
            List<Ticket> tickets1 = new List<Ticket>() { repository.GetUsers().First() };
            List<Ticket> tickets2 = new List<Ticket>() { repository.GetUsers().Last() };
            dataGridView1.DataSource = tickets1.Union(tickets2).ToList();
        }

        private void button8_Click(object sender, EventArgs e)//агрегирование
        {
            Repository repository = new Repository();
            textBox3.Text = repository.GetUsers().Sum(p => p.Price).ToString();
        }

        
    }
}
