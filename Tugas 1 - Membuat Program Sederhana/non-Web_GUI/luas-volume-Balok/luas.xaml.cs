using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
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
using System.Text.RegularExpressions;
using System.ComponentModel;

namespace luas_volume_Balok
{
    /// <summary>
    /// Interaction logic for luas.xaml
    /// </summary> 
    public partial class luas : Page
    {
        public luas()
        {
            InitializeComponent();
            
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            if(txtPanjang.Text == "" || txtLebar.Text == "" || txtTinggi.Text == "" )
            {
                MessageBox.Show("Maaf... Tidak bisa menghitung ada data masih ada yang kosong");
            }
            else
            {

            double panjang, lebar, tinggi, luas, volume;

            panjang = Convert.ToDouble(txtPanjang.Text);
            lebar = Convert.ToDouble(txtLebar.Text);
            tinggi = Convert.ToDouble(txtTinggi.Text);

            luas = 2 * ((panjang * lebar) + (panjang * tinggi) + (lebar * tinggi));
            volume = panjang * lebar * tinggi;

            txtLuas.Text = Convert.ToString(luas);
            txtVolume.Text = Convert.ToString(volume);
            }

        }

        private void txtPanjang_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);

        }

        private void txtLebar_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void txtTinggi_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9.,]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            txtPanjang.Clear();
            txtLebar.Clear();
            txtTinggi.Clear();
            txtLuas.Clear();
            txtVolume.Clear();
        }

         
    }
}
