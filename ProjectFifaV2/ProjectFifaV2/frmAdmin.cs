using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.IO;

namespace ProjectFifaV2
{
    public partial class frmAdmin : Form
    {
        private DatabaseHandler dbh;
        private OpenFileDialog opfd;

        DataTable table;

        public frmAdmin()
        {
            dbh = new DatabaseHandler();
            table = new DataTable();
            this.ControlBox = false;
            InitializeComponent();
        }

        private void btnAdminLogOut_Click(object sender, EventArgs e)
        {
            txtQuery.Text = null;
            txtPath = null;
            dgvAdminData.DataSource = null;
            frmLogin login = new frmLogin();
            login.Show();
            Close();
        }

        private void btnExecute_Click(object sender, EventArgs e)
        {
            if (txtQuery.TextLength > 0)
            {
                ExecuteSQL(txtQuery.Text);
            }
        }

        private void ExecuteSQL(string selectCommandText)
        {
            dbh.TestConnection();
            SqlDataAdapter dataAdapter = new SqlDataAdapter(selectCommandText, dbh.GetCon());
            dataAdapter.Fill(table);
            dgvAdminData.DataSource = table;
        }

        private void btnSelectFile_Click(object sender, EventArgs e)
        {
            txtPath.Text = null;
            
            string path = GetFilePath();

            if (CheckExtension(path, "csv"))
            {
                txtPath.Text = path;
            }
            else
            {
                MessageHandler.ShowMessage("The wrong filetype is selected.");
            }
        }

        private void btnLoadData_Click(object sender, EventArgs e)
        {
            string[] tables = new string[3];
            tables[0] = "[tblGames]";
            tables[1] = "[tblPlayers]";
            tables[2] = "[tblTeams]";
            if (!(txtPath.Text == null))
            {

                dbh.OpenConnectionToDB();
                DialogResult result = MessageBox.Show("Are you sure you want to clear the database?", "Clear database", MessageBoxButtons.OKCancel, MessageBoxIcon.Information);
                if (result.Equals(DialogResult.OK))
                {
                    DataTable hometable =   dbh.FillDT("DELETE FROM [tblGames];");
                                            dbh.FillDT("DELETE FROM [tblPlayers];");
                                            dbh.FillDT("DELETE FROM [tblPredictions];");
                                            dbh.FillDT("DELETE FROM [tblTeams];");
                    using (var fs = File.OpenRead(@"project_fifa.csv"))
                    using (var reader = new StreamReader(fs))
                    {
                        List<string> listA = new List<string>();
                        string[] values = new string[0];
                        int number = 0;
                        List<string> numbers = new List<string>();
                        List<string> valueList;
                        for (int i = -1; i < tables.Length;)
                        {
                            while (!reader.EndOfStream)
                            {
                                //split the lines for proper values
                                string line = reader.ReadLine();
                                values = line.Split(',', ';', '"');
                                valueList = new List<string>(values);

                                //remove any whitespaces
                                for (int j = 0; j < values.Count(); j++)
                                {
                                    valueList.Remove("");
                                }
                                numbers = new List<string>(valueList.Count());
                                //change values from csv to integers if possible
                                for (int j = 0; j < valueList.Count(); j++)
                                {
                                    if (int.TryParse(valueList[j], out number))
                                        numbers.Add(number.ToString());
                                    else if (valueList[j] == "NULL")
                                    {
                                        valueList[j] = 0.ToString();
                                        numbers.Add(valueList[j]);
                                    }
                                    else
                                        numbers.Add(valueList[j]);
                                }
                                //check if the value starts with this stringvalue then switch database
                                if (valueList[0].StartsWith("1") || reader.EndOfStream)
                                {
                                    i++;
                                }
                                break;
                            }
                            if (i == 0)
                            {
                                using (SqlCommand cmd = new SqlCommand("INSERT INTO [tblGames] ([HomeTeam], [AwayTeam], [HomeTeamScore], [AwayTeamScore]) VALUES (@HomeTeam, @AwayTeam, @HomeTeamScore, @AwayTeamScore)"))
                                {
                                    //parameters for tblGames
                                    cmd.Parameters.AddWithValue("HomeTeam", numbers[0]);
                                    cmd.Parameters.AddWithValue("AwayTeam", numbers[1]);
                                    cmd.Parameters.AddWithValue("HomeTeamScore", numbers[2]);
                                    cmd.Parameters.AddWithValue("AwayTeamScore", numbers[3]);
                                    dbh.OpenConnectionToDB();
                                    cmd.Connection = dbh.GetCon();
                                    cmd.ExecuteNonQuery();
                                    dbh.CloseConnectionToDB();
                                }
                            }
                            if (i == 1)
                            {
                                using (SqlCommand cmd = new SqlCommand("INSERT INTO [tblPlayers] ([Name], [Surname], [GoalsScored], [Team_id]) VALUES (@name, @surname, @goalsScored, @teamID)"))
                                {
                                    //parameters for tblPlayers
                                    cmd.Parameters.AddWithValue("name", numbers[3]);
                                    cmd.Parameters.AddWithValue("surname", numbers[4]);
                                    cmd.Parameters.AddWithValue("goalsScored", 0);
                                    cmd.Parameters.AddWithValue("teamID", numbers[2]);
                                    dbh.OpenConnectionToDB();
                                    cmd.Connection = dbh.GetCon();
                                    cmd.ExecuteNonQuery();
                                    dbh.CloseConnectionToDB();
                                }
                            }
                            if (i == 2 || i == 3)
                            {
                                using (SqlCommand cmd = new SqlCommand("INSERT INTO [tblTeams] ([TeamName]) VALUES (@TeamName)"))
                                {
                                    //parameters for tblTeams
                                    cmd.Parameters.AddWithValue("TeamName", numbers[2]);
                                    dbh.OpenConnectionToDB();
                                    cmd.Connection = dbh.GetCon();
                                    cmd.ExecuteNonQuery();
                                    dbh.CloseConnectionToDB();
                                }
                            }
                        }                     
                    }
                }
                dbh.CloseConnectionToDB();
            }
            else
            {
                MessageHandler.ShowMessage("No filename selected.");
            }
        }
        
        private string GetFilePath()
        {
            string filePath = "";
            opfd = new OpenFileDialog();

            opfd.Multiselect = false;

            if (opfd.ShowDialog() == DialogResult.OK)
            {
                filePath = opfd.FileName;
            }

            return filePath;
        }

        private bool CheckExtension(string fileString, string extension)
        {
            int extensionLength = extension.Length;
            int strLength = fileString.Length;

            string ext = fileString.Substring(strLength - extensionLength, extensionLength);

            if (ext == extension)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
