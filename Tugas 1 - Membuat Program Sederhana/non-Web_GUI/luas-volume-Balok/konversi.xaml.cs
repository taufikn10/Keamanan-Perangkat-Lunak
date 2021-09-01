using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace luas_volume_Balok
{
    /// <summary>
    /// Interaction logic for konversi.xaml
    /// </summary>
    public partial class konversi : Page
    {

        private string Nim = "";
        private string Nama = "";
        private string Matkul = "";

        public konversi()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            txtNim.Clear();
            txtNama.Clear();
            txtMatkul.Clear();
            txtAbsen.Clear();
            txtTugas.Clear();
            txtUTS.Clear();
            txtUAS.Clear();
            txtNA.Clear();
            txtKN.Clear();
            txtKt.Clear();
            nim.Content = string.Empty;
            nama.Content = string.Empty;
            matkul.Content = string.Empty;


        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {


            if (txtNim.Text == "" || txtNama.Text == "" || txtMatkul.Text == "" || txtAbsen.Text == ""
                || txtTugas.Text == "" || txtUTS.Text == "" || txtUAS.Text == "")
            {
                MessageBox.Show("Maaf... Tidak bisa menghitung ada data masih ada yang kosong");
            }
            else
            {
                Nim = txtNim.Text;
                nim.Content = Nim.ToString();
                Nama = txtNama.Text;
                nama.Content = Nama.ToString();
                Matkul = txtMatkul.Text;
                matkul.Content = Matkul.ToString();

                double absen, tugas, UTS, UAS, NA;


                absen = Convert.ToDouble(txtAbsen.Text);
                tugas = Convert.ToDouble(txtTugas.Text);
                UTS = Convert.ToDouble(txtUTS.Text);
                UAS = Convert.ToDouble(txtUAS.Text);

                NA = (2 * absen + 3 * tugas + 2 * UTS + 3 * UAS) / 10;

                txtNA.Text = Convert.ToString(NA);


                if (NA >= 100)
                {
                    txtKN.Text = "A";
                    txtKt.Text = "Sangat Memuaskan";
                }
                else if (NA >= 85 && NA < 100)
                {
                    txtKN.Text = "A";
                    txtKt.Text = "Sangat Memuaskan";
                }
                else if (NA >= 80 && NA < 85)
                {
                    txtKN.Text = "A-";
                    txtKt.Text = "Memuaskan";
                }
                else if (NA >= 75 && NA < 80)
                {
                    txtKN.Text = "B+";
                    txtKt.Text = "Sangat Baik";
                }
                else if (NA >= 70 && NA < 75)
                {
                    txtKN.Text = "B";
                    txtKt.Text = "Baik";
                }
                else if (NA >= 65 && NA < 70)
                {
                    txtKN.Text = "B-";
                    txtKt.Text = "Cukup Baik";
                }
                else if (NA >= 60 && NA < 65)
                {
                    txtKN.Text = "C+";
                    txtKt.Text = "Sangat Cukup";
                }
                else if (NA >= 55 && NA < 60)
                {
                    txtKN.Text = "C";
                    txtKt.Text = "Cukup";
                }
                else if (NA >= 40 && NA < 55)
                {
                    txtKN.Text = "C-";
                    txtKt.Text = "Hampir Cukup";
                }
                else
                {
                    txtKN.Text = "E";
                    txtKt.Text = "Belum Lulus";
                }
            }


        }

        private void txtNim_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);


        }

        private void txtAbsen_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void txtTugas_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void txtUTS_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void txtUAS_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void txtNama_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            if (!System.Text.RegularExpressions.Regex.IsMatch(e.Text, "^[a-zA-Z]"))
            {
                e.Handled = true;
            }
        }
    }
}
