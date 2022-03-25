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
    public partial class MainForm : Form
    {
        AddTicket addTicket;
        DeleteForm DeleteForm;
        ShowForm ShowForm;
        public MainForm()
        {
            InitializeComponent();
            InitializeData();
        }
        void InitializeData()
        {
            Repository repository = new Repository();
            dataGridView1.DataSource = repository.GetUsers();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            addTicket = new AddTicket();
            addTicket.Show();
        }
        private void button3_Click(object sender, EventArgs e)
        {
            DeleteForm = new DeleteForm();
            DeleteForm.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            InitializeData();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            ShowForm = new ShowForm();
            ShowForm.Show();
        }
    }
}
