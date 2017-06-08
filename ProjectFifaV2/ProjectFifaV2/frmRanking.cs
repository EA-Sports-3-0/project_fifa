using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace ProjectFifaV2
{
    public partial class frmRanking : Form
    {
        DatabaseHandler dbh;
        private string username = "test";
        private int userID;
        public frmRanking(string username, int userID)
        {
            this.ControlBox = false;
            dbh = new DatabaseHandler();
            InitializeComponent();
            SetListColumnWidth();
            ShowScore();
            this.username = username;
            this.userID = userID;
        }

        private void btnRankingBack_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void SetListColumnWidth()
        {
            clmRank.Width = 45;
            clmName.Width = 300;
            clmScore.Width = 80;
        }

        private void ShowScore()
        {
            dbh.TestConnection();
            dbh.OpenConnectionToDB();
            int userID = 0;
            int score = 0;
            int matches;
            DataTable users = dbh.FillDT("SELECT Username, Score FROM tblUsers WHERE (IsAdmin = 0) ORDER BY Score DESC");


            //using (SqlCommand cmd = new SqlCommand("SELECT COUNT(Game_id) FROM tblGames"))
            //{
            //    dbh.OpenConnectionToDB();
            //    cmd.Connection = dbh.GetCon();
            //    matches = (int)cmd.ExecuteScalar();
            //    dbh.CloseConnectionToDB();
            //}
            //DataTable scoreHome = dbh.FillDT("SELECT HomeTeamScore FROM tblGames");
            //DataTable scoreAway = dbh.FillDT("SELECT AwayTeamScore FROM tblGames");
            //List<int> predictedHomeScores = new List<int>();
            //List<int> predictedAwayScores = new List<int>();
            //using (SqlCommand cmd = new SqlCommand("SELECT predictedHomeScore FROM tblPredictions WHERE User_ID = @userID"))
            //{
            //    dbh.OpenConnectionToDB();
            //    cmd.Connection = dbh.GetCon();
            //    cmd.Parameters.AddWithValue("userID", userID);
            //    using (SqlDataReader objReader = cmd.ExecuteReader())
            //    {
            //        if(objReader.HasRows)
            //        {
            //            while(objReader.Read())
            //            {
            //                int item = objReader.GetInt32(objReader.GetOrdinal("predictedHomeScore"));
            //                predictedHomeScores.Add(item);
            //            }
            //        }
            //    }
            //    dbh.CloseConnectionToDB();
            //}
            //using (SqlCommand cmd = new SqlCommand("SELECT predictedAwayScore FROM tblPredictions WHERE User_ID = @userID"))
            //{
            //    dbh.OpenConnectionToDB();
            //    cmd.Connection = dbh.GetCon();
            //    cmd.Parameters.AddWithValue("userID", userID);
            //    using (SqlDataReader objReader = cmd.ExecuteReader())
            //    {
            //        if (objReader.HasRows)
            //        {
            //            while (objReader.Read())
            //            {
            //                int item = objReader.GetInt32(objReader.GetOrdinal("predictedHomeScore"));
            //                predictedHomeScores.Add(item);
            //            }
            //        }
            //    }
            //    dbh.CloseConnectionToDB();
            //}
            //for (int i = 0; i < matches; i++)
            //{
            //    if (scoreHome.AsEnumerable().ToString() == predictedHomeScores[i].ToString() && scoreAway.AsEnumerable().ToString() == predictedAwayScores[i].ToString())
            //        score = score + 2;
            //    else if (scoreHome.AsEnumerable().ToString() == predictedHomeScores[i].ToString() || scoreAway.AsEnumerable().ToString() == predictedAwayScores[i].ToString())
            //        score++;
            //}

            //using (SqlCommand cmd = new SqlCommand("UPDATE [tblUsers] score = @score WHERE id = @userID"))
            //{
            //    cmd.Parameters.AddWithValue("userID", userID);
            //    cmd.Parameters.AddWithValue("score", score);
            //}
                for (int i = 0; i < users.Rows.Count; i++)
                {
                    DataRow dataRow = users.Rows[i];
                    ListViewItem lstItem = new ListViewItem((i + 1).ToString());
                    lstItem.SubItems.Add(dataRow["Username"].ToString());
                    lstItem.SubItems.Add(dataRow["Score"].ToString());
                    lvRanking.Items.Add(lstItem);
                }
            dbh.CloseConnectionToDB();
        }
    }
}
