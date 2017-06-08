using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Windows.Forms;

namespace ProjectFifaV2
{
    public partial class frmPlayer : Form
    {
        private Form frmRanking;
        private DatabaseHandler dbh;
        private string userName;
        private int userID;

        List<TextBox> txtBoxList;

        public frmPlayer(Form frm, string un)
        {
            this.userName = un;
            this.ControlBox = false;
            frmRanking = frm;
            dbh = new DatabaseHandler();
            dbh.OpenConnectionToDB();
            using(SqlCommand cmd = new SqlCommand("SELECT * FROM [tblUsers] WHERE Username = @username", dbh.GetCon()))
            {
                cmd.Parameters.AddWithValue("Username", userName);
                SqlDataReader dr = cmd.ExecuteReader();
                dr.Read();
                this.userID = dr.GetInt32(0);
                dr.Close();
            }
            dbh.CloseConnectionToDB();
            InitializeComponent();
            if (DisableEditButton())
            {
                btnEditPrediction.Enabled = false;
            }
            ShowResults();
            ShowScoreCard();
            this.Text = "Welcome " + un;
        }

        private void btnLogOut_Click(object sender, EventArgs e)
        {
            frmLogin login = new frmLogin();
            login.Show();
            Close();
        }

        private void btnShowRanking_Click(object sender, EventArgs e)
        {
            frmRanking = new frmRanking(userName, userID);
            frmRanking.Show();
        }

        private void btnClearPrediction_Click(object sender, EventArgs e)
        {
            int userID = this.userID;
            DialogResult result = MessageBox.Show("Are you sure you want to clear your prediction?", "Clear Predictions", MessageBoxButtons.OKCancel, MessageBoxIcon.Information);
                if (result.Equals(DialogResult.OK))
                {
                    using (SqlCommand cmd = new SqlCommand("DELETE FROM tblPredictions WHERE User_ID = @userID;", dbh.GetCon()))
                    {
                    cmd.Parameters.AddWithValue("UserID", userID);
                    dbh.OpenConnectionToDB();
                        cmd.ExecuteNonQuery();
                    dbh.CloseConnectionToDB();
                    MessageBox.Show("Your predictions have been removed");
                    }
                }
        }

        private void btnEditPrediction_Click(object sender, EventArgs e)
        {
            dbh.OpenConnectionToDB();
            using (SqlCommand cmd = new SqlCommand("DELETE FROM [tblPredictions] WHERE user_id = @userID", dbh.GetCon()))
            {
                cmd.Connection = dbh.GetCon();
                cmd.Parameters.AddWithValue("userID", userID);
                cmd.ExecuteNonQuery();
                dbh.CloseConnectionToDB();
            }
            if (!DisableEditButton())
            {
                int gameID = 99;
                int homeScore = 99;
                int awayScore = 99;
                int matches = 0;
                //query to get the GameID
                using (SqlCommand cmd = new SqlCommand("SELECT COUNT(*) FROM [tblGames]", dbh.GetCon()))
                {
                    dbh.OpenConnectionToDB();
                    cmd.Connection = dbh.GetCon();
                    SqlDataReader dr = cmd.ExecuteReader();
                    dr.Read();
                    matches = dr.GetInt32(0);
                    dr.Close();
                    dbh.CloseConnectionToDB();
                }
                for (int i = 0; i < matches*2; i += 2)
                {
          
                        int.TryParse(txtBoxList[i].Tag.ToString(), out gameID);
                        int.TryParse(txtBoxList[i].Text, out homeScore);
                        int.TryParse(txtBoxList[i + 1].Text, out awayScore);
                    

                    //query to add values into tblPredictions
                    using (SqlCommand cmd = new SqlCommand("INSERT INTO [tblPredictions] ([User_id], [Game_id], [PredictedHomeScore], [PredictedAwayScore]) VALUES (@userID, @gameID, @homeScore, @awayScore)"))
                    {
                        dbh.OpenConnectionToDB();
                        cmd.Connection = dbh.GetCon();
                        cmd.Parameters.AddWithValue("UserID", userID);
                        cmd.Parameters.AddWithValue("GameId", gameID);
                        cmd.Parameters.AddWithValue("HomeScore", homeScore);
                        cmd.Parameters.AddWithValue("AwayScore", awayScore);
                        cmd.Connection = dbh.GetCon();
                        cmd.ExecuteNonQuery();
                        dbh.CloseConnectionToDB();

                    }
                }
                MessageBox.Show("Prediction succesfully added");
                dbh.CloseConnectionToDB();
            }
        }

        private bool DisableEditButton()
        {
            bool hasPassed;
            //This is the deadline for filling in the predictions
            DateTime deadline = new DateTime(2017, 06, 15);
            DateTime curTime = DateTime.Now;
            int result = DateTime.Compare(deadline, curTime);

            if (result < 0)
            {
                hasPassed = true;
            }
            else
            {
                hasPassed = false;
            }

            return hasPassed;
        }

        private void ShowResults()
        {
            dbh.TestConnection();
            dbh.OpenConnectionToDB();

            DataTable hometable = dbh.FillDT("SELECT tblTeams.TeamName, tblGames.HomeTeamScore FROM tblGames INNER JOIN tblTeams ON tblGames.HomeTeam = tblTeams.Team_ID");
            DataTable awayTable = dbh.FillDT("SELECT tblTeams.TeamName, tblGames.AwayTeamScore FROM tblGames INNER JOIN tblTeams ON tblGames.AwayTeam = tblTeams.Team_ID");

            dbh.CloseConnectionToDB();

            for (int i = 0; i < hometable.Rows.Count; i++)
            {
                DataRow dataRowHome = hometable.Rows[i];
                DataRow dataRowAway = awayTable.Rows[i];
                ListViewItem lstItem = new ListViewItem(dataRowHome["TeamName"].ToString());
                lstItem.SubItems.Add(dataRowHome["HomeTeamScore"].ToString());
                lstItem.SubItems.Add(dataRowAway["AwayTeamScore"].ToString());
                lstItem.SubItems.Add(dataRowAway["TeamName"].ToString());
                lvOverview.Items.Add(lstItem);
            }
        }

        private void ShowScoreCard()
        {
            dbh.TestConnection();
            dbh.OpenConnectionToDB();
            
            DataTable hometable = dbh.FillDT("SELECT tblGames.Game_id, tblTeams.TeamName FROM tblGames INNER JOIN tblTeams ON tblGames.HomeTeam = tblTeams.Team_ID");
            DataTable awayTable = dbh.FillDT("SELECT tblGames.Game_id, tblTeams.TeamName FROM tblGames INNER JOIN tblTeams ON tblGames.AwayTeam = tblTeams.Team_ID");

            dbh.CloseConnectionToDB();
            txtBoxList = new List<TextBox>();
            for (int i = 0; i < hometable.Rows.Count; i++)
            {
                DataRow dataRowHome = hometable.Rows[i];
                DataRow dataRowAway = awayTable.Rows[i];
                
                Label lblHomeTeam = new Label();
                Label lblAwayTeam = new Label();
                TextBox txtHomePred = new TextBox();
                TextBox txtAwayPred = new TextBox();              

                txtBoxList.Add(txtHomePred);
                txtBoxList.Add(txtAwayPred);

                lblHomeTeam.TextAlign = ContentAlignment.BottomRight;
                lblHomeTeam.Text = dataRowHome["TeamName"].ToString();
                lblHomeTeam.Location = new Point(15, txtHomePred.Bottom + (i * 30));
                lblHomeTeam.AutoSize = true;

                txtHomePred.Text = "0";
                txtHomePred.Location = new Point(lblHomeTeam.Width, lblHomeTeam.Top - 3);
                txtHomePred.Width = 40;
                txtHomePred.Tag = dataRowHome["Game_id"].ToString();

                txtAwayPred.Text = "0";
                txtAwayPred.Location = new Point(txtHomePred.Width + lblHomeTeam.Width, txtHomePred.Top);
                txtAwayPred.Width = 40;
                txtAwayPred.Tag = dataRowAway["Game_id"].ToString();

                lblAwayTeam.Text = dataRowAway["TeamName"].ToString();
                lblAwayTeam.Location = new Point(txtHomePred.Width + lblHomeTeam.Width + txtAwayPred.Width, txtHomePred.Top + 3);
                lblAwayTeam.AutoSize = true;

                pnlPredCard.Controls.Add(lblHomeTeam);
                pnlPredCard.Controls.Add(txtHomePred);
                pnlPredCard.Controls.Add(txtAwayPred);
                pnlPredCard.Controls.Add(lblAwayTeam);
                //ListViewItem lstItem = new ListViewItem(dataRowHome["TeamName"].ToString());
                //lstItem.SubItems.Add(dataRowHome["HomeTeamScore"].ToString());
                //lstItem.SubItems.Add(dataRowAway["AwayTeamScore"].ToString());
                //lstItem.SubItems.Add(dataRowAway["TeamName"].ToString());
                //lvOverview.Items.Add(lstItem);
            }
        }

        internal void GetUsername(string un)
        {
            userName = un;
        }

    }
}
