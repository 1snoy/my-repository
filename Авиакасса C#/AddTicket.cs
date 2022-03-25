using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Авиакасса
{
    public partial class AddTicket : Form
    {
        public AddTicket()
        {
            InitializeComponent();
            textBox2.Text = DateTime.Now.ToString();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string p = @"^([a-zA-Z]{2}[0-9]{7})$";
            Regex regex = new Regex(p, RegexOptions.Compiled);
            MatchCollection matches = regex.Matches(textBox4.Text);
            if (textBox1.Text == "" || textBox2.Text == "" || textBox3.Text == "" || textBox4.Text == "" || textBox5.Text == "" || textBox6.Text == "" || textBox7.Text == ""||textBox9.Text == "" || textBox8.Text == "")
            {
                MessageBox.Show("Чего-то не хватает");
                return;
            }
            if (matches.Count != 1)
            {
                MessageBox.Show("Неправильный паспорт");
                return;
            }

            Ticket ticket = new Ticket
            {
                Id = int.Parse(textBox1.Text),
                Date = DateTime.Parse(textBox2.Text),
                Name = textBox3.Text,
                NumberOfPassport = (textBox4.Text),
                NumberOfReys = int.Parse(textBox5.Text),
                NumberOfSeat = int.Parse(textBox6.Text),
                Price = int.Parse(textBox7.Text),
                StartCity=textBox8.Text,
                FinishCity=textBox9.Text
            };
            Repository repository = new Repository();
            repository.Create(ticket);
            ActiveForm.Hide();
        }
    }
}
